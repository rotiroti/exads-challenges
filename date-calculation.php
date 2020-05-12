#!/usr/bin/env php
<?php

/*
 |----------------------------------------------------------------------------------------------------
 | Date Calculation
 |----------------------------------------------------------------------------------------------------
 |
 | The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
 | Write a function or class that calculates and returns the next valid draw date based on the current
 | date and time AND also on an optionally supplied date and time.
 */

require __DIR__ . '/vendor/autoload.php';

use Rotiroti\Exads\DateCalculation\IrishNationalLottery;

$obj = new IrishNationalLottery();
$nextDateTime = $obj->nextDraw()->format('l jS \of F Y h:i:s A');

echo "The next drawn date for the Irish National Lottery is: " . $nextDateTime . PHP_EOL;
exit(0);
