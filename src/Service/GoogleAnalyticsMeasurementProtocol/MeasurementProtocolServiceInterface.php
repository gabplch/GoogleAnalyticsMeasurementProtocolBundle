<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GoogleAnalyticsMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GoogleAnalyticsReportInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface MeasurementProtocolServiceInterface
{
    public const API_SECRET = 'api_secret';

    public function sendReport(GoogleAnalyticsReportInterface $googleAnalyticsReport): ResponseInterface;
}
