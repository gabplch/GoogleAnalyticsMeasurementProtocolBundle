<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\DependencyInjection\Compiler\RegisterGAMeasurementProtocolPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GoogleAnalyticsMeasurementProtocolBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new RegisterGAMeasurementProtocolPass());
    }
}
