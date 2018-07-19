<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;

class MenuContext implements Context
{
    /**
     * @Given with this role the main menu :arg1 is hidden
     */
    public function withThisRoleTheMainMenuIsHidden($arg1)
    {

    }

    /**
     * @Given with this role the menu entry :arg1 of main menu :arg2 is hidden
     */
    public function withThisRoleTheMenuEntryOfMainMenuIsHidden($arg1, $arg2)
    {

    }

}

