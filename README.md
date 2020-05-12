## EXADS Coding Challenges
[![Packagist License](https://poser.pugx.org/barryvdh/laravel-debugbar/license.png)](http://choosealicense.com/licenses/mit/)

This is repository contains solutions for the Exads Coding Challenges.

It includes:
 - FizzBuzz 
 - 500 Element Array
 - Database Connectivity
 - Date Calculation
 - A/B Testing

## Requirements

- [PHP 7.4.5](https://www.php.net/downloads.php#v7.4.5)
- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/) (optional)
 
## Installation
After cloning the repository, run the following commands:

```shell
$ cd exads-challenges
$ composer install
```
 
## Usage
All the scripts can be run via [Composer](https://getcomposer.org/):
```shell
$ composer run <challenge-script-name>
```
or by simply executing them:
```shell
$ ./challenge-script-name.php
```

#### FizzBuzz Challenge
Write a PHP script that prints all integer values from 1 to 100.

For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
Values which are multiples of both three and five should output as "FizzBuzz".

```shell
$ composer run fizz-buzz
```

#### 500 Element Array Challenge
Write a PHP script to generate a random array of 500 integers (values of 1 – 500 inclusive).
Randomly remove and discard an arbitrary element from this newly generated array.

Write the code to efficiently determine the value of the missing element. Explain your reasoning with comments.

```shell
$ composer run 500-element-array
```

#### Date Calculation
The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.

Write a function or class that calculates and returns the next valid draw date based on the current date
and time AND also on an optionally supplied date and time.

```shell
$ composer run date-calculation
```

#### Database Connectivity
Demonstrate with PHP how you would connect to a MySQL (InnoDB) database and query for all records with
the following fields: (name, age, job_title) from a table called 'exads_test'.

Also provide an example of how you would write a sanitised record to the same table.

#### Scripts

- db-mysqli-connect: show how to connect to MySQL using MySQLi
- db-mysqli-insert: show how to insert a record using MySQLi
- db-pdo-connect: show how to connect to MySQL using PDO
- db-pdo-insert: show how to insert a record using PDO

#### Example Run
```shell
$ cp .env-example .env
$ docker-compose up -d
$ composer run db-mysqli-connect
$ composer run db-mysqli-insert
$ composer run db-mysqli-connect
```

#### A/B Testing
Exads would like to A/B test a number of promotional designs to see which provides the best conversion rate.

Write a snippet of PHP code that redirects end users to the different designs based on the database table below.
Extend the database model as needed.

i.e. - 50% of people will be shown Design A, 25% shown Design B and 25% shown Design C.
The code needs to be scalable as a single promotion may have upwards of 3 designs to test.

| design_id | design_name | split_percent |
|-----------|-------------|---------------|
| 1         | Design 1    | 50            |
| 2         | Design 2    | 25            |
| 3         | Design 3    | 25            |

#### Example Run
```shell
$ cp .env-example .env
$ docker-compose up -d
$ composer run ab-testing
```

## Test
The following challenges contains some unit tests developed by using PHPUnit:

- FizzBuzz
- 500 Element Array
- Date Calculation

To run all the test, execute the following command inside the root directory of this repository:
```shell
$ ./vendor/bin/phpunit -v --coverage-text 
```
