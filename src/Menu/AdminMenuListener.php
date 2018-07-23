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
                foreach ($this->hiddenMenusConfig[$roleName] as $mainMenuEntryName => $menuEntryNames) {
                    if (0 < count($menuEntryNames)) {
                        foreach ($menuEntryNames as $menuEntryName) {
                            $menuEntry = $menu->getChild($mainMenuEntryName);
                            if (null !== $menuEntry) {
                                $menuEntry->removeChild($menuEntryName);
                            }
                        }
                    } else {
                        $menu->removeChild($mainMenuEntryName);
                    }
                }
            }
        }
    }
}

