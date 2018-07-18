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

class ConfigContext implements Context
{
    /**
     * @Given the store has a :configName configuration:
     */
    public function theStoreHasAConfiguration($configName, PyStringNode $configValue)
    {

    }
}

