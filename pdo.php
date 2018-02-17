<?php
//	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=online_job', 'root', ''); //development
	$pdo = new PDO('mysql:35.224.141.246;port=3306;dbname=online_job', 'root', 'peromingan'); //production
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>