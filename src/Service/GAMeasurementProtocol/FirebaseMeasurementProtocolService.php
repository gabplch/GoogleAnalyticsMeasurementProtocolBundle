<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\Firebase\GAFirebaseReportInterface;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GAReportInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\ResponseInterface;

class FirebaseMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    private const FIREBASE_APP_ID = 'firebase_app_id';

    public function __construct(
        string $connectionPath,
        string $apiSecret,
        private readonly string $firebaseAppId,
    ) {
        parent::__construct($connectionPath, $apiSecret);
    }

    public function sendReport(GAFirebaseReportInterface|GAReportInterface $googleAnalyticsReport): ResponseInterface
    {
        $payload = $this->serializer->serialize($googleAnalyticsReport, 'json');

        $request = $this->httpClient->request(
            Request::METHOD_POST,
            $this->connectionPath,
            [
                'query' => [
                    self::FIREBASE_APP_ID => $this->firebaseAppId,
                    self::API_SECRET => $this->apiSecret,
                ],
                'body' => $payload,
            ]
        );

        return $request;
    }
}
