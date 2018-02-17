<?php
function getdatabase()
{
    try {
     //   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=online_job', 'root', ''); //development
        $pdo = new PDO('mysql:35.224.141.246;port=3306;dbname=online_job', 'root', 'peromingan'); //production
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbConnection;
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
