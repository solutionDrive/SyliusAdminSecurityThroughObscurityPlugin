<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Page\Admin;

use Behat\Mink\Element\NodeElement;
use Sylius\Behat\Page\SymfonyPageInterface;

interface MenuPageInterface  extends SymfonyPageInterface
{
    public function getMenuEntryByValue(string $menuValue): ?NodeElement;
}
