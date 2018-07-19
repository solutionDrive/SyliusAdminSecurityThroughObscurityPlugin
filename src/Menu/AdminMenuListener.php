<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Sylius\Component\User\Model\UserInterface;

final class AdminMenuListener
{
    /** @var string[] */
    private $hiddenMenusConfig = [];

    /** @var UserInterface */
    private $user;

    /**
     * @param string[] $hiddenMenusConfig
     */
    public function __construct(
        array $hiddenMenusConfig,
        UserInterface $user
    ) {
        $this->hiddenMenusConfig = $hiddenMenusConfig;
        $this->user = $user;
    }

    public function adjustAdminMenu(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        if (true === empty($this->hiddenMenusConfig)) {
            return;
        }

        $userRoles = $this->user->getRoles();
        foreach ($userRoles as $roleName) {
            if (true === isset($this->hiddenMenusConfig[$roleName])) {
                foreach ($this->hiddenMenusConfig[$roleName] as $mainMenuEntry => $menuEntries) {
                    if (0 < count($menuEntries)) {
                        foreach ($menuEntries as $menuEntry) {
                            $menu->getChild($mainMenuEntry)->removeChild($menuEntry);
                        }
                    } else {
                        $menu->removeChild($mainMenuEntry);
                    }
                }
            }
        }

        // TODO: hide menus based on user role
//        $hiddenSettings = [
//            'catalog' => [
//                'association_types',
//            ],
//            'customers' => [
//                'groups',
//            ],
//            'marketing',
//            'configuration' => [
//                'channels',
//                'countries',
//                'currencies',
//                'exchange_rates',
//                'locales',
//                'payment_methods',
//                'shipping_categories',
//                'shipping_methods',
//                'tax_categories',
//                'tax_rates',
//                'zones',
//            ],
//        ];
//
//        foreach ($hiddenSettings as $key => $mainMenuEntry) {
//            if (is_array($mainMenuEntry)) {
//                foreach ($mainMenuEntry as $subMenuEntry) {
//                    $menu->getChild($key)->removeChild($subMenuEntry);
//                }
//            } else {
//                $menu->removeChild($mainMenuEntry);
//            }
//        }
//
//        $menu->getChild('configuration')
//            ->addChild('internal_order_reasons', ['route' => 'app_admin_internal_order_reason_index'])
//            ->setLabel('app.ui.internal_order_reasons');
    }
}

