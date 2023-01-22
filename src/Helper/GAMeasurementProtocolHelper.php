<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Helper;

class GAMeasurementProtocolHelper
{
    public const MEASUREMENT_PROTOCOL_HOST = 'https://www.google-analytics.com';
    public const MEASUREMENT_PROTOCOL_PATH = '/mp/collect';
    public const MEASUREMENT_PROTOCOL_DEBUG_PATH = '/debug';

    public static function getMeasurementProtocolConnectionPath(bool $isDebug): string
    {
        $path = self::MEASUREMENT_PROTOCOL_HOST;

        if ($isDebug) {
            $path = sprintf('%s%s', $path, self::MEASUREMENT_PROTOCOL_DEBUG_PATH);
        }

        $path = sprintf('%s%s', $path, self::MEASUREMENT_PROTOCOL_PATH);

        return $path;
    }

    public static function fakeClientId(int $googleAnalyticsVersion): string
    {
        $uniqueId = random_int(1000000000, 9999999999);
        $timestamp = (new \DateTime())->getTimestamp();

        return sprintf('GA%d.1.%d.%d', $googleAnalyticsVersion, $uniqueId, $timestamp);
    }
}
