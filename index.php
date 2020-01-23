<?php
require "Controller/GlobalController.php";
require "Model/Database.php";
require "Model/Article.php";
require "Model/Category.php";

$config = require "./resources/config/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['db_charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
$db = new Database($pdo);

$controller = new GlobalController($db);
$controller->index();