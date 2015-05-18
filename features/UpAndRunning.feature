Feature: Up and Running
  In order to confirm Behat and Zombie are Working
  As a developer
  I need to see a homepage


  Scenario: Homepage Exists
    When I go to "/bdd/"
    Then I should see "Welcome to the world of BDD"
