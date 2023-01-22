<?php

declare(strict_types=1);

namespace App\Service\GoogleAnalyticsMeasurementProtocol;

class FirebaseMeasurementProtocolService extends AbstractMeasurementProtocolService
{
    public function __construct(
        string $connectionPath,
        string $apiSecret,
        private readonly string $firebaseAppId,
    ) {
        parent::__construct($connectionPath, $apiSecret);
    }
}
