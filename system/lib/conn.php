<?php

function conn(){
	
	mb_internal_encoding('UTF-8');
	
	try {
		$dbh = new PDO("mysql:host=127.0.0.1;port=3306;dbname=sysBrejo", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' COLLATE 'utf8_general_ci'"));
   		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
		$dbh->exec("set names utf8");
		
		return $dbh;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

}