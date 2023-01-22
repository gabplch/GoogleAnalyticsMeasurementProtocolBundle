<?php

declare(strict_types=1);

namespace App\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('google_analytics_measurement_protocol');

        /** @var ArrayNodeDefinition $root */
        $root = $treeBuilder->getRootNode();

        $root
            ->children()
                ->scalarNode('api_secret')
                    ->defaultValue('%env(GOOGLE_ANALYTICS_API_SECRET)%')
                    ->info('Your secret api key, generated in Google Analytics UI.')
                ->end()
                ->scalarNode('measurement_id')
                    ->defaultValue('%env(GOOGLE_ANALYTICS_MEASUREMENT_ID)%')
                    ->info('Your measurement id, associated with a stream. Found in the Google Analytics UI.')
                ->end()
                ->scalarNode('firebase_app_id')
                    ->defaultValue('%env(GOOGLE_ANALYTICS_FIREBASE_APP_ID)%')
                    ->info('The Firebase App ID. The identifier for a Firebase app. Found in the Firebase console.')
                ->end()
                ->booleanNode('debug')
                    ->defaultFalse()
                    ->info('Enables debug mode for google analytics request.')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
