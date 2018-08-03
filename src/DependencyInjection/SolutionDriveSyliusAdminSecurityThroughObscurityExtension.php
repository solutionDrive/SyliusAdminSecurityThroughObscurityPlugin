<?php

declare(strict_types=1);

namespace solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class SolutionDriveSyliusAdminSecurityThroughObscurityExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('solution_drive_sylius_admin_security_through_obscurity.additional_admin_roles', $config['additional_admin_roles']);
        $container->setParameter('solution_drive_sylius_admin_security_through_obscurity.hidden_menus', $config['hidden_menus']);
    }
}
