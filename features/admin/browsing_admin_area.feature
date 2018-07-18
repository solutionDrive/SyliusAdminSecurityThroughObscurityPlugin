@browsing_admin_area
Feature: Browsing admin area
  In order to get an overview over the shop
  As an administrator
  I want to see the admin area

  Background:
    Given the store operates on a single channel in "United States"
      And the store has a "solutiondrive_sylius_adminsecurity_through_obscurity_plugin" configuration:
        """
          additional_admin_roles:
            - SECURITY_EXPERT
          hidden_menus:
            SECURITY_EXPERT:
              - catalog: ~
              - configuration:
                - administrators
        """

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

  @ui @todo
  Scenario: Browsing admin area with SECURITY_EXPERT admin role
    Given there is an administrator "security_is_important@example.com"
      And this administrator has the role "SECURITY_EXPERT"
     When I am logged in as "security_is_important@example.com" administrator
      And I open administration dashboard
     Then I should not see "Catalog" menu entry
      And I should see "Configuration" menu entry
      And I should not see "Configuration->Administrators" menu entry
