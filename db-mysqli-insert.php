#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

/*
 |-------------------------------------------------------------------------------------------------------
 | Database Connectivity using MySQLi - Sanitized Record Example
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

$user = [
    'name' => 'Richiard Stallman',
    'age' => 67,
    'job_title' => 'Activist Programmer'
];

/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "INSERT INTO exads_test (name, age, job_title) VALUES (?, ?, ?)")) {
    /* bind parameters */
    mysqli_stmt_bind_param($stmt, "sis", $name, $age, $job_title);

    /**
     * Sharing knowledge is the most fundamental act of friendship.
     * Because it is a way you can give something without loosing something.
     */
    $name = 'Richiard Stallman';
    $age = 67;
    $job_title = 'Activist Programmer';

    /* execute query */
    mysqli_stmt_execute($stmt);

    printf("New user created: Name: %s\tAge: %d\tJob Title: %s\n", $name, $age, $job_title);

    /* close statement */
    mysqli_stmt_close($stmt);
}

/* close connection */
mysqli_close($link);
