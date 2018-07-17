@browsing_admin_area
Feature: Browsing admin area
  In order to get an overview over the shop
  As an administrator
  I want to see the admin area

  Background:
    Given the store operates on a single channel in "United States"
    And I am logged in as an administrator

  @ui
  Scenario: Browsing admin area with default admin role
    When I open administration dashboard
    Then I should see "Catalog" menu entry
     And I should see "Sales" menu entry
     And I should see "Customer" menu entry
     And I should see "Marketing" menu entry
     And I should see "Configuration" menu entry
