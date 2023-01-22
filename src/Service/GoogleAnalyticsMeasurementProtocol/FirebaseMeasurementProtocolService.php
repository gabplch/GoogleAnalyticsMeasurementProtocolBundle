<?php

declare(strict_types=1);

namespace App\Service\GoogleAnalyticsMeasurementProtocol;

use App\Trait\HttpClientTrait;
use App\Trait\SerializerTrait;

class FirebaseMeasurementProtocolService implements MeasurementProtocolServiceInterface
{
    use HttpClientTrait;
    use SerializerTrait;

    public function __construct(
        private readonly string $apiSecret,
        private readonly string $firebaseAppId,
    ) {
    }
}
