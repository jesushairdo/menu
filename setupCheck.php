<?php
	date_default_timezone_set('UTC');	
	try 
	{
		// create database and open connections
		// Create (connect to SQLite Database in file)
		$fileDb = new PDO('sqlite:food.sqlite3');
		//set erromode to exceptions
		$fileDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$fileDb->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
		//create tables
		//enable foreign keys
		$fileDb->exec('PRAGMA foreign_keys=on');
		$result = $fileDb->query('SELECT name FROM sqlite_master WHERE type = "table"');
		foreach ($result as $row)
		{
			$tableInfo = $fileDb->query('PRAGMA table_info('. $row->name .')');
			foreach ($tableInfo as $column)
			{
				print_r($column);
			}
		}
		//close db connection
		$fileDb = null;
		echo "All Done";		
	}
	catch(PDOExeption $e)
	{
		echo $e->getMessage();
	}
?>