<?php

declare(strict_types=1);

namespace solutionDrive\SyliusAdminSecurityThroughObscurityPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SolutionDriveSyliusAdminSecurityThroughObscurityPlugin extends Bundle
{
    use SyliusPluginTrait;
}
