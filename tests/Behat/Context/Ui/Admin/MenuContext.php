<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Page\Admin\MenuPageInterface;
use Webmozart\Assert\Assert;

class MenuContext implements Context
{
    /** @var MenuPageInterface */
    private $menuPage;

    /**
     * @param MenuPageInterface $menuPage
     *
     */
    public function __construct(
        MenuPageInterface $menuPage
    ) {
        $this->menuPage = $menuPage;
    }

    /**
     * @Then I should see :menuValue menu entry
     */
    public function iShouldSeeMenuEntry($menuValue)
    {
        $menuEntry = $this->menuPage->getMenuEntryByValue($menuValue);
        Assert::notNull($menuEntry);
    }
}

