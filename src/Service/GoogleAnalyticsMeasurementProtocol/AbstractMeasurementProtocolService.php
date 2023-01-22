<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GoogleAnalyticsMeasurementProtocol;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Trait\HttpClientTrait;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Trait\SerializerTrait;

abstract class AbstractMeasurementProtocolService implements MeasurementProtocolServiceInterface
{
    use HttpClientTrait;
    use SerializerTrait;

    public function __construct(
        protected readonly string $connectionPath,
        protected readonly string $apiSecret,
    ) {
    }
}
