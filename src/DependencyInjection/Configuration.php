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
        $rootNode = $treeBuilder->root('solution_drive_sylius_admin_security_through_obscurity');

        $rootNode
            ->children()
                ->arrayNode('additional_admin_roles')
                    ->info('Describes which additional roles should be available for administrators')
                    ->scalarPrototype()
                    ->end()
                ->end()
                ->arrayNode('hidden_menus')
                    ->info('Describes which menus should be hidden for a specific role')
                    ->arrayPrototype()
                        ->arrayPrototype()
                            ->scalarPrototype()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
