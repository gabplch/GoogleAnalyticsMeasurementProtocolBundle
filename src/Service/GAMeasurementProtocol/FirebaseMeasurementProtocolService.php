<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\Firebase\GAFirebaseReportInterface;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GAReportInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class FirebaseMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    protected final const FIREBASE_APP_ID_KEY = 'firebase_app_id';

    public function __construct(
        HttpClientInterface $httpClient,
        Serializer $serializer,
        ValidatorInterface $validator,
        string $connectionPath,
        string $apiSecret,
        private readonly string $firebaseAppId,
    ) {
        parent::__construct($httpClient, $serializer, $validator, $connectionPath, $apiSecret);
    }

    public function sendReport(GAFirebaseReportInterface|GAReportInterface $googleAnalyticsReport): ResponseInterface
    {
        $this->validator->validate($googleAnalyticsReport);

        $payload = $this->serializer->serialize($googleAnalyticsReport, 'json');

        $request = $this->httpClient->request(
            Request::METHOD_POST,
            $this->connectionPath,
            [
                'query' => [
                    self::FIREBASE_APP_ID_KEY => $this->firebaseAppId,
                    self::API_SECRET_KEY => $this->apiSecret,
                ],
                'body' => $payload,
            ]
        );

        return $request;
    }
}
