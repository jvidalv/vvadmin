<?php

$ip = $_SERVER['DB_IP'];
$db = $_SERVER['DB_NAME'];
$name = $_SERVER['DB_USER'];
$pw = $_SERVER['DB_PASSWORD'];

$mongo_db = $_SERVER['DB_MONGO_URI'];


return [
    'db' => [
        'class' => 'yii\db\Connection',
        'dsn' =>  "mysql:host=$ip;dbname=$db",
        'username' => $name,
        'password' => $pw,
        'charset' => 'utf8',
    ],
    'db_astrale' => [
        'class' => '\yii\mongodb\Connection',
        'dsn' => $mongo_db . 'astrale?authSource=admin',
    ],
];
