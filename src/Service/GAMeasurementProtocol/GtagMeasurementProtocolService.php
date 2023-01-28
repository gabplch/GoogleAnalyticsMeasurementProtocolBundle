<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GAReportInterface;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\Gtag\GAGtagReportInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GtagMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    protected final const MEASUREMENT_ID_KEY = 'measurement_id';

    public function __construct(
        HttpClientInterface $httpClient,
        Serializer $serializer,
        string $connectionPath,
        string $apiSecret,
        private readonly string $measurementId,
    ) {
        parent::__construct($httpClient, $serializer, $connectionPath, $apiSecret);
    }

    public function sendReport(GAGtagReportInterface|GAReportInterface $googleAnalyticsReport): ResponseInterface
    {
        $payload = $this->serializer->serialize($googleAnalyticsReport, 'json');

        $request = $this->httpClient->request(
            Request::METHOD_POST,
            $this->connectionPath,
            [
                'query' => [
                    self::MEASUREMENT_ID_KEY => $this->measurementId,
                    self::API_SECRET_KEY => $this->apiSecret,
                ],
                'body' => $payload,
            ]
        );

        return $request;
    }
}
