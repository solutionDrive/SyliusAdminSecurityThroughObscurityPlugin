<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;

class AdminContext implements Context
{
    /**
     * @Given this administrator has the role :roleName
     */
    public function thisAdministratorHasTheRole($roleName)
    {

    }
}

