#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

/*
 |-----------------------------------------------------------------------------------------------------------------
 | A/B Testing
 |-----------------------------------------------------------------------------------------------------------------
 |
 | Exads would like to A/B test a number of promotional designs to see which provides the best conversion rate.
 |
 | Write a snippet of PHP code that redirects end users to the different designs based on the database table below.
 | Extend the database model as needed.
 |
 | i.e. - 50% of people will be shown Design A, 25% shown Design B and 25% shown Design C.
 | The code needs to be scalable as a single promotion may have upwards of 3 designs to test.
 |
 | Database: exads
 | Table name: exads_design_test
 |
 */

$db_name = getenv('DB_DATABASE');
$db_username = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');
$db_host = getenv('DB_HOST');

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "SELECT design_id, design_name, split_percent FROM exads_design_test")) {
    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $id, $name, $split_percent);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        printf("ID: %s\t\tDesign: %d\t\tSplit percent: %s\n", $id, $name, $split_percent);
    }

    /* close statement */
    mysqli_stmt_close($stmt);
}

mysqli_close($link);
