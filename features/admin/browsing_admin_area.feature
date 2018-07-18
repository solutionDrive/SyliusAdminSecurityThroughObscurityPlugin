@browsing_admin_area
Feature: Browsing admin area
  In order to get an overview over the shop
  As an administrator
  I want to see the admin area

  Background:
    Given the store operates on a single channel in "United States"
    And I am logged in as an administrator

  @ui
  Scenario: Browsing admin area with default admin role to see main menu
    When I open administration dashboard
    Then I should see "Catalog" menu entry
     And I should see "Sales" menu entry
     And I should see "Customer" menu entry
     And I should see "Marketing" menu entry
     And I should see "Configuration" menu entry

  @ui
  Scenario: Browsing admin area with default admin role to see sub menu
    When I open administration dashboard
    Then I should see "Catalog->Products" menu entry
    Then I should see "Catalog->Options" menu entry
    And I should see "Sales->Orders" menu entry
    And I should see "Customer->Customers" menu entry
    And I should see "Customer->Groups" menu entry
    And I should see "Marketing->Promotions" menu entry
    And I should see "Marketing->Product reviews" menu entry
    And I should see "Configuration->Channels" menu entry
    And I should see "Configuration->Currencies" menu entry
    And I should see "Configuration->Locales" menu entry
    And I should see "Configuration->Administrators" menu entry
