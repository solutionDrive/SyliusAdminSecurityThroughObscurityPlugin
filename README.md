Sylius AdminSecurity Through Obscurity Plugin
===============================================

This plugin does NOT provide any security!

It only hides specific menu points in the backend for defined set of roles.
But if a person knows the urls the sites are still accessable.

To really manage access for some roles we recommend to have a look at 
[Sylius Access Control Layer Plugin from bitbag](https://bitbag.shop/products/sylius-access-control-layer)

This plugin is for sylius
<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img height="50" src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

## Usage

### Preparation

  Prepare environment (we only need this once per environment)

  - `test` environment:

    ```bash
    $ composer install
    $ (cd tests/Application && yarn install)
    $ (cd tests/Application && yarn run gulp)
    $ (cd tests/Application && bin/console assets:install web -e test)
    
    $ (cd tests/Application && bin/console doctrine:database:create -e test)
    $ (cd tests/Application && bin/console doctrine:schema:create -e test) 
    ```
    
  - `dev` environment:

    ```bash
    $ composer install
    $ (cd tests/Application && yarn install)
    $ (cd tests/Application && yarn run gulp)
    $ (cd tests/Application && bin/console assets:install web -e dev)
    
    $ (cd tests/Application && bin/console doctrine:database:create -e dev)
    $ (cd tests/Application && bin/console doctrine:schema:create -e dev) 
    ```

### Running plugin tests

  - PHPUnit

    ```bash
    $ bin/phpunit
    ```

  - PHPSpec

    ```bash
    $ bin/phpspec run
    ```

  - Behat (non-JS scenarios)

    ```bash
    $ bin/behat --tags="~@javascript"
    ```

  - Behat (JS scenarios)
 
    1. Download [Chromedriver](https://sites.google.com/a/chromium.org/chromedriver/)
    
    2. Run Selenium server with previously downloaded Chromedriver:
    
        ```bash
        $ bin/selenium-server-standalone -Dwebdriver.chrome.driver=chromedriver
        ```
    3. Run test application's webserver on `localhost:8080`:
    
        ```bash
        $ (cd tests/Application && bin/console server:run 127.0.0.1:8080 -d web -e test)
        ```
    
    4. Run Behat:
    
        ```bash
        $ bin/behat --tags="@javascript"
        ```
