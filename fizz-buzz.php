#!/usr/bin/env php
<?php

/*
 |-------------------------------------------------------------------------------------------------------
 | FizzBuzz
 |-------------------------------------------------------------------------------------------------------
 |
 | Write a PHP script that prints all integer values from 1 to 100.
 | For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
 | Values which are multiples of both three and five should output as "FizzBuzz".
 */

require __DIR__ . '/vendor/autoload.php';

use Rotiroti\Exads\FizzBuzz\FizzBuzz;

$fizz_buzz = new FizzBuzz();
echo join("\n", $fizz_buzz->run(100)) . "\n";
exit(0);
