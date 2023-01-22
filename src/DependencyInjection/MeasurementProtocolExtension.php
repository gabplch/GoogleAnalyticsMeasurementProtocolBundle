<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MeasurementProtocolExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('google_analytics_measurement_protocol.api_secret', $config['api_secret']);
        $container->setParameter('google_analytics_measurement_protocol.measurement_id', $config['measurement_id']);
        $container->setParameter('google_analytics_measurement_protocol.firebase_app_id', $config['firebase_app_id']);
        $container->setParameter('google_analytics_measurement_protocol.debug', $config['debug']);
    }
}
