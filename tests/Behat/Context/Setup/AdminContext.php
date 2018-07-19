<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace Tests\solutionDrive\SyliusAdminSecurityThroughObscurityPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;

class AdminContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        UserRepositoryInterface $userRepository
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given /^(this administrator) has the (role "[^"]+")$/
     */
    public function thisAdministratorHasTheRole(
        AdminUserInterface $adminUser,
        $roleName
    ) {
        $adminUser->addRole($roleName);

        $this->userRepository->add($adminUser);
        $this->sharedStorage->set('administrator', $adminUser);
    }

    /**
     * @Given /^there is an admin role "([^"]*)"$/
     */
    public function thereIsAnAdminRole($roleName)
    {
        $roles = [];
        if (true === $this->sharedStorage->has('roles')) {
            $roles = $this->sharedStorage->get('roles');
        }
        if (false === in_array($roleName, $roles)) {
            $roles[] = $roleName;
        }
        $this->sharedStorage->set('roles', $roles);
    }
}

