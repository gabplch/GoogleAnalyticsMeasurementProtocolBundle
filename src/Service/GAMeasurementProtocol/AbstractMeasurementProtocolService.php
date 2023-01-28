<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol;

use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractMeasurementProtocolService implements MeasurementProtocolServiceInterface
{
    public function __construct(
        protected readonly HttpClientInterface $httpClient,
        protected readonly Serializer $serializer,
        protected readonly string $connectionPath,
        protected readonly string $apiSecret,
    ) {
    }
}
