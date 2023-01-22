<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Helper\GAMeasurementProtocolHelper;
use App\Service\GoogleAnalyticsMeasurementProtocol\FirebaseMeasurementProtocolService;
use App\Service\GoogleAnalyticsMeasurementProtocol\GtagMeasurementProtocolService;
use App\Service\GoogleAnalyticsMeasurementProtocol\MeasurementProtocolServiceInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class RegisterMeasurementProtocolPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $connectionPath = GAMeasurementProtocolHelper::getMeasurementProtocolConnectionPath($container->getParameter('google_analytics_measurement_protocol.debug'));

        if (null !== $container->getParameter('google_analytics_measurement_protocol.measurement_id')) {
            $definition = new Definition(
                GtagMeasurementProtocolService::class,
                [
                    $connectionPath,
                    $container->getParameter('google_analytics_measurement_protocol.api_secret'),
                    $container->getParameter('google_analytics_measurement_protocol.measurement_id'),
                ]
            );
        } else {
            $definition = new Definition(
                FirebaseMeasurementProtocolService::class,
                [
                    $connectionPath,
                    $container->getParameter('google_analytics_measurement_protocol.api_secret'),
                    $container->getParameter('google_analytics_measurement_protocol.firebase_app_id'),
                ]
            );
        }

        $container->setDefinition(MeasurementProtocolServiceInterface::class, $definition);
    }
}
