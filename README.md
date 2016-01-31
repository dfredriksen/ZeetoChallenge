# ZeetoChallenge

## Dependencies

PHP CLI, a global composer installation.

## Installation and Execution

Inside the root project directory, first execute
```
composer update
```

This will download all of the project dependencies. To begin the game, type

```
php main.php
```

## Executing tests

From the root directory

```
vendor/bin/phpunit -c tests/phpunit.xml
```

### Technical Debt

```
Add a unit test to make sure exact cards dealt no longer exist in stack
Speed up performance of evaluation algorithm so it is not worst case O(n^m)
Add Namespaces to classes
```
