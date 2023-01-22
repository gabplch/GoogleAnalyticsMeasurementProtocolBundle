<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GoogleAnalyticsMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GoogleAnalyticsReportInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class FirebaseMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    public function __construct(
        string $connectionPath,
        string $apiSecret,
        private readonly string $firebaseAppId,
    ) {
        parent::__construct($connectionPath, $apiSecret);
    }

    public function sendReport(GoogleAnalyticsReportInterface $googleAnalyticsReport): ResponseInterface
    {
    }
}
