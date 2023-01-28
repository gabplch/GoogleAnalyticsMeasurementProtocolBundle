<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\GAReportInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface MeasurementProtocolServiceInterface
{
    final public const API_SECRET_KEY = 'api_secret';

    public function sendReport(GAReportInterface $googleAnalyticsReport): ResponseInterface;
}
