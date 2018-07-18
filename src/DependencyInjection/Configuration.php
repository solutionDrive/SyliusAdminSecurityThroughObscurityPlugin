<?php

declare(strict_types=1);

namespace solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('solutiondrive_sylius_adminsecurity_through_obscurity');

        $rootNode
            ->children()
                ->arrayNode('additional_admin_roles')
                    ->info('Describes which additional roles should be available for administrators')
                ->end()
                ->arrayNode('hidden_menus')
                    ->info('Describes which menus should be hidden for a specific role')
                    ->arrayPrototype()
                        ->scalarPrototype()
                        ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
