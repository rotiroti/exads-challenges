#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

/*
 |-------------------------------------------------------------------------------------------------------
 | Database Connectivity using PHP PDO
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
$db_dns = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO(
        $db_dns,
        $db_username,
        $db_password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );

    if ($stmt = $pdo->prepare("SELECT name, age, job_title FROM exads_test")) {
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            printf("Name: %s\t\tAge: %d\t\tJob Title: %s\n", $row['name'], $row['age'], $row['job_title']);
        }
    }
} catch (PDOException $error) {
    echo $error->getMessage();
}
