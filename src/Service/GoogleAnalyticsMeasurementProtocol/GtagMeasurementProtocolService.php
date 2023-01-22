<?php

declare(strict_types=1);

namespace App\Service\GoogleAnalyticsMeasurementProtocol;

class GtagMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    public function __construct(
        string $connectionPath,
        string $apiSecret,
        private readonly string $measurementId,
    ) {
        parent::__construct($connectionPath, $apiSecret);
    }
}
