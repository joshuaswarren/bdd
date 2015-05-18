Feature: Process Time Off Request
  In order to manage my team
  As a manager
  I need to be able to approve and deny time off requests

  Scenario: Time Off Request Management View Exists
    When I go to "/bdd/timeoff/manage"
    Then I should see "Manage Time Off Requests"

  Scenario: Time Off Request List
    When I go to "/bdd/timeoff/manage"
    And I press "View"
    Then I should see "Pending Time Off Request Details"

  Scenario: Approve Time Off Request
    When I go to "/bdd/timeoff/manage"
    And I press "View"
    And I press "Approve"
    Then I should see "Time Off Request Approved"

  Scenario: Deny Time Off Request
    When I go to "/bdd/timeoff/manage"
    And I press "View"
    And I press "Deny"
    Then I should see "Time Off Request Denied"
