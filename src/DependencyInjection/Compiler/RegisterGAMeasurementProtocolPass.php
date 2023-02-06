<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\DependencyInjection\Compiler;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Helper\GAMeasurementProtocolHelper;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol\FirebaseMeasurementProtocolService;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol\GtagMeasurementProtocolService;
use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Service\GAMeasurementProtocol\MeasurementProtocolServiceInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RegisterGAMeasurementProtocolPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        /** @var bool $isDebug */
        $isDebug = $container->getParameter('google_analytics_measurement_protocol.debug');

        $connectionPath = GAMeasurementProtocolHelper::getMeasurementProtocolConnectionPath($isDebug);

        if (null !== $container->getParameter('google_analytics_measurement_protocol.measurement_id')) {
            $definition = new Definition(
                GtagMeasurementProtocolService::class,
                [
                    $connectionPath,
                    $container->findDefinition(HttpClientInterface::class),
                    $container->getDefinition(Serializer::class),
                    $container->getDefinition(ValidatorInterface::class),
                    $container->getParameter('google_analytics_measurement_protocol.api_secret'),
                    $container->getParameter('google_analytics_measurement_protocol.measurement_id'),
                ]
            );
        } else {
            $definition = new Definition(
                FirebaseMeasurementProtocolService::class,
                [
                    $connectionPath,
                    $container->findDefinition(HttpClientInterface::class),
                    $container->getDefinition(Serializer::class),
                    $container->getDefinition(ValidatorInterface::class),
                    $container->getParameter('google_analytics_measurement_protocol.api_secret'),
                    $container->getParameter('google_analytics_measurement_protocol.firebase_app_id'),
                ]
            );
        }

        $container->setDefinition(MeasurementProtocolServiceInterface::class, $definition);
    }
}
