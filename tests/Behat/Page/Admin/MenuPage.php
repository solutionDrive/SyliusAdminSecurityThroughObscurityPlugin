<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Page\Admin;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception\ElementNotFoundException;
use Sylius\Behat\Page\SymfonyPage;

class MenuPage extends SymfonyPage implements MenuPageInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        # The menu does not have an own route
        return 'sylius_admin_dashboard';
    }

    public function getMenuEntryByValue(string $menuValue): NodeElement
    {
        $menuEntry = null;
        try {
            $menuEntry = $this->getElement($menuValue);
        } catch (ElementNotFoundException $exception) {
            $menuEntry = null;
        }
        return $menuEntry;
    }

    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'Catalog' => 'div.menu div.item div.header:contains("Catalog")',
            'Sales' => 'div.menu div.item div.header:contains("Sales")',
            'Customer' => 'div.menu div.item div.header:contains("Customer")',
            'Marketing' => 'div.menu div.item div.header:contains("Marketing")',
            'Configuration' => 'div.menu div.item div.header:contains("Configuration")',
        ]);
    }
}

