#!/usr/bin/env php
<?php

/*
 |---------------------------------------------------------------------------------------------
 | 500 Element Array
 |---------------------------------------------------------------------------------------------
 | Write a PHP script to generate a random array of 500 integers (values of 1 – 500 inclusive).
 | Randomly remove and discard an arbitrary element from this newly generated array.
 |
 | Write the code to efficiently determine the value of the missing element.
 | Explain your reasoning with comments.
 */

require __DIR__ . '/vendor/autoload.php';

use Rotiroti\Exads\MissingElement\RandomMissingElement;

$obj = new RandomMissingElement();

try {
    echo $obj->find($obj->unique(500)) . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}

exit(0);
