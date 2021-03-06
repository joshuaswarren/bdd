Feature: Submit Time Off Request
  In order to request time off
  As a developer
  I need to be able to fill out a time off request form

  Scenario: Time Off Request Form Exists
    When I go to "/bdd/timeoff/new"
    Then I should see "New Time Off Request"

  Scenario: Time Off Request Form Works
    When I go to "/bdd/timeoff/new"
    And I fill in "name" with "Josh"
    And I fill in "reason" with "Attending a great conference"
    And I press "submit"
    Then I should see "Time Off Request Submitted"
