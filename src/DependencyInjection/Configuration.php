<?php

namespace Janwebdev\ImageBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('intervention_image');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('driver')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
