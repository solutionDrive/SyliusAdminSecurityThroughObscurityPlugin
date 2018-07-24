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
    private const MAIN_ENTRY = 'div.menu div.item div.header';

    private const SUB_ENTRY = 'div.menu a.item';

    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        # The menu does not have an own route
        return 'sylius_admin_dashboard';
    }

    public function getMenuEntryByValue(string $menuValue): ?NodeElement
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
        $catalogMenuElements = [
            'Catalog'               => self::MAIN_ENTRY . ':contains("Catalog")',
            'Catalog->Taxons'       => self::MAIN_ENTRY . ':contains("Catalog") + ' . self::SUB_ENTRY . ':contains("Taxons")',
            'Catalog->Products'     => self::MAIN_ENTRY . ':contains("Catalog") + ' . self::SUB_ENTRY . ':contains("Products")',
            'Catalog->Inventory'    => self::MAIN_ENTRY . ':contains("Catalog") + ' . self::SUB_ENTRY . ':contains("Inventory")',
            'Catalog->Attributes'   => self::MAIN_ENTRY . ':contains("Catalog") + ' . self::SUB_ENTRY . ':contains("Attributes")',
            'Catalog->Options'      => self::MAIN_ENTRY . ':contains("Catalog") + ' . self::SUB_ENTRY . ':contains("Options")',
        ];

        $salesMenuElements = [
            'Sales'         => self::MAIN_ENTRY . ':contains("Sales")',
            'Sales->Orders' => self::MAIN_ENTRY . ':contains("Sales") + ' . self::SUB_ENTRY . ':contains("Orders")',
        ];

        $customerMenuElements = [
            'Customer'              => self::MAIN_ENTRY . ':contains("Customer")',
            'Customer->Customers'   => self::MAIN_ENTRY . ':contains("Customer") + ' . self::SUB_ENTRY . ':contains("Customers")',
            'Customer->Groups'      => self::MAIN_ENTRY . ':contains("Customer") + ' . self::SUB_ENTRY . ':contains("Groups")',
        ];

        $marketingMenuElements = [
            'Marketing'                     => self::MAIN_ENTRY . ':contains("Marketing")',
            'Marketing->Promotions'         => self::MAIN_ENTRY . ':contains("Marketing") + ' . self::SUB_ENTRY . ':contains("Promotions")',
            'Marketing->Product reviews'    => self::MAIN_ENTRY . ':contains("Marketing") + ' . self::SUB_ENTRY . ':contains("Product reviews")',
        ];

        $configurationMenuElements = [
            'Configuration'                         => self::MAIN_ENTRY . ':contains("Configuration")',
            'Configuration->Channels'               => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Channels")',
            'Configuration->Countries'              => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Countries")',
            'Configuration->Zones'                  => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Zones")',
            'Configuration->Currencies'             => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Currencies")',
            'Configuration->Exchange rates'         => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Exchange rates")',
            'Configuration->Locales'                => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Locales")',
            'Configuration->Payment methods'        => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Payment methods")',
            'Configuration->Shipping methods'       => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Shipping methods")',
            'Configuration->Shipping categories'    => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Shipping categories")',
            'Configuration->Tax categories'         => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Tax categories")',
            'Configuration->Tax rates'              => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Tax rates")',
            'Configuration->Administrators'         => self::MAIN_ENTRY . ':contains("Configuration") + ' . self::SUB_ENTRY . ':contains("Administrators")',
        ];

        return array_merge(
            parent::getDefinedElements(),
            $catalogMenuElements,
            $salesMenuElements,
            $customerMenuElements,
            $marketingMenuElements,
            $configurationMenuElements
        );
    }
}
