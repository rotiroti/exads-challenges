#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

/*
 |-------------------------------------------------------------------------------------------------------
 | Database Connectivity using PHP PDO - Sanitized Record Example
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

    if ($stmt = $pdo->prepare("INSERT INTO exads_test (name, age, job_title) VALUES (:name, :age, :job_title)")) {
        $user = [
            'name' => 'Rob C. Pike',
            'age' => 63,
            'job_title' => 'Software Engineer'
        ];
        $stmt->execute($user);

        printf("New user created: Name: %s\tAge: %d\tJob Title: %s\n", $user['name'], $user['age'], $user['job_title']);
    }
} catch (PDOException $error) {
    echo $error->getMessage();
}
