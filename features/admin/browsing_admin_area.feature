@browsing_admin_area
Feature: Browsing admin area
  In order to get an overview over the shop
  As an administrator
  I want to see the admin area

  Background:
    Given the store operates on a single channel in "United States"

    # ADDITIONAL HINTS:
    # the config under tests/Application/app/config/config.yml configures the plugin
    # There are 2 additional roles: SECURITY_EXPERT and ONLY_A_EXPERT
    # The hidden menus for SECURITY_EXPERT are the main menu 'Catalog'
    # and the menu entries 'Administrators' and 'Channels' from main menu 'Configuration'
    # There are no hidden menus for ONLY_A_EXPERT

  @ui
  Scenario: Browsing admin area with default admin role to see main menu
    When I am logged in as an administrator
     And I open administration dashboard
    Then I should see "Catalog" menu entry
     And I should see "Sales" menu entry
     And I should see "Customer" menu entry
     And I should see "Marketing" menu entry
     And I should see "Configuration" menu entry

  @ui
  Scenario: Browsing admin area with default admin role to see sub menu
    When I am logged in as an administrator
     And I open administration dashboard
    Then I should see "Catalog->Products" menu entry
     And I should see "Catalog->Options" menu entry
     And I should see "Sales->Orders" menu entry
     And I should see "Customer->Customers" menu entry
     And I should see "Customer->Groups" menu entry
     And I should see "Marketing->Promotions" menu entry
     And I should see "Marketing->Product reviews" menu entry
     And I should see "Configuration->Channels" menu entry
     And I should see "Configuration->Currencies" menu entry
     And I should see "Configuration->Locales" menu entry
     And I should see "Configuration->Administrators" menu entry

  @ui
  Scenario: Browsing admin area with SECURITY_EXPERT admin role
    Given there is an administrator "security_is_important@example.com"
      And this administrator has the role "SECURITY_EXPERT"
     When I am logged in as "security_is_important@example.com" administrator
      And I open administration dashboard
     Then I should not see "Catalog" menu entry
      And I should see "Configuration" menu entry
      And I should not see "Configuration->Channels" menu entry
      And I should see "Configuration->Locales" menu entry
      And I should not see "Configuration->Administrators" menu entry

  @ui
  Scenario: Browsing admin area with ONLY_A_EXPERT admin role
    Given there is an administrator "expert@example.com"
      And this administrator has the role "ONLY_A_EXPERT"
     When I am logged in as "expert@example.com" administrator
      And I open administration dashboard
     Then I should see "Catalog->Taxons" menu entry
      And I should see "Catalog->Products" menu entry
      And I should see "Catalog->Inventory" menu entry
      And I should see "Catalog->Attributes" menu entry
      And I should see "Catalog->Options" menu entry
      And I should see "Sales->Orders" menu entry
      And I should see "Customer->Customers" menu entry
      And I should see "Customer->Groups" menu entry
      And I should see "Marketing->Promotions" menu entry
      And I should see "Marketing->Product reviews" menu entry
      And I should see "Configuration->Channels" menu entry
      And I should see "Configuration->Countries" menu entry
      And I should see "Configuration->Zones" menu entry
      And I should see "Configuration->Currencies" menu entry
      And I should see "Configuration->Exchange rates" menu entry
      And I should see "Configuration->Locales" menu entry
      And I should see "Configuration->Payment methods" menu entry
      And I should see "Configuration->Shipping methods" menu entry
      And I should see "Configuration->Shipping categories" menu entry
      And I should see "Configuration->Tax categories" menu entry
      And I should see "Configuration->Tax rates" menu entry
      And I should see "Configuration->Administrators" menu entry
