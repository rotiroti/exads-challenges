#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

/*
 |-------------------------------------------------------------------------------------------------------
 | Database Connectivity using MySQLi
 |-------------------------------------------------------------------------------------------------------
 |
 | Demonstrate with PHP how you would connect to a MySQL (InnoDB) database and query for all records with
 | the following fields: (name, age, job_title) from a table called 'exads_test'.
 |
 | Also provide an example of how you would write a sanitised record to the same table.
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
if ($stmt = mysqli_prepare($link, "SELECT name, age, job_title FROM exads_test")) {
    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $name, $age, $job_title);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        printf("Name: %s\t\tAge: %d\t\tJob Title: %s\n", $name, $age, $job_title);
    }

    /* close statement */
    mysqli_stmt_close($stmt);
}

mysqli_close($link);
