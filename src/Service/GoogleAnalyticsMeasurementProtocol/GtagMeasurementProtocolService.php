<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GoogleAnalyticsMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GoogleAnalyticsReportInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GtagMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    private const MEASUREMENT_ID = 'measurement_id';

    public function __construct(
        string $connectionPath,
        string $apiSecret,
        private readonly string $measurementId,
    ) {
        parent::__construct($connectionPath, $apiSecret);
    }

    public function sendReport(GoogleAnalyticsReportInterface $googleAnalyticsReport): ResponseInterface
    {
    }
}
