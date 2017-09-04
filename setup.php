<?php
	date_default_timezone_set('UTC');
	try
	{
		// create database and open connections
		// Create (connect to SQLite Database in file)
		$fileDb = new PDO('sqlite:food.sqlite3');
		//set erromode to exceptions
		$fileDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//create tables
		//enable foreign keys
		$fileDb->exec('PRAGMA foreign_keys=on');
		//create units table
		$fileDb->exec('CREATE TABLE IF NOT EXISTS tblUnits (unitId INTEGER PRIMARY KEY, unitName TEXT unique)');
		//create Ingredients table
		$fileDb->exec('CREATE TABLE IF NOT EXISTS tblIngredients (ingredientId INTEGER PRIMARY KEY, ingredientName TEXT unique)');
		//create workouts table
		$fileDb->exec('CREATE TABLE IF NOT EXISTS tblWorkOuts (workoutId INTEGER PRIMARY KEY, workoutName TEXT unique, workoutLocation TEXT, workoutReference TEXT)');
		//create recipes table
		$fileDb->exec('CREATE TABLE IF NOT EXISTS tblRecipes (recipeId INTEGER PRIMARY KEY, recipeName TEXT unique, recipeLocation TEXT, recipeReference TEXT)');
		//create recipeIngredients table
		$fileDb->exec('CREATE TABLE IF NOT EXISTS tblRecipeIngredients (recipeId INTEGER, ingredientId INTEGER, amount TEXT, unitId INTEGER, PRIMARY KEY (recipeId, ingredientId), FOREIGN KEY (recipeId) REFERENCES tblRecipes(recipeId) ON UPDATE CASCADE, FOREIGN KEY(ingredientId) REFERENCES tblIngredients(ingredientId) ON UPDATE CASCADE) WITHOUT ROWID');
		//create menus table
		$fileDb->exec('CREATE TABLE IF NOT EXISTS tblMenus (menuId INTEGER PRIMARY KEY, startdate INTEGER, meal1 INTEGER, meal2 INTEGER, meal3 INTEGER, workout1 INTEGER, workout2 INTEGER, workout3 INTEGER, FOREIGN KEY(meal1) REFERENCES tblRecipes(recipeId) ON UPDATE CASCADE, FOREIGN KEY(meal2) REFERENCES tblRecipes(recipeId) ON UPDATE CASCADE, FOREIGN KEY(meal3) REFERENCES tblRecipes(recipeId) ON UPDATE CASCADE, FOREIGN KEY(workout1) REFERENCES tblWorkOuts(workoutId) ON UPDATE CASCADE, FOREIGN KEY(workout2) REFERENCES tblWorkOuts(workoutId) ON UPDATE CASCADE, FOREIGN KEY(workout3) REFERENCES tblWorkOuts(workoutId) ON UPDATE CASCADE)');

		/*
		// set initial data
		$messages = array(
			array('title'=>'Hello!', 'message'=> 'Just Testing....', 'time' => 1327301464),
			array('title'=>'Hello Again!', 'message'=>'More testing....', 'time'=>1339428612),
			array('title'=>'Hi!', 'message'=>'SQLite3 is cool...', 'time'=>1327214268)
		);
		// prep insert statement
		$insert = "INSERT INTO messages (title,message,time) VALUES (:title, :message, :time)";
		$stmt = $fileDb->prepare($insert);

		//bind parameters to statement variables
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':message', $message);
		$stmt->bindParam(':time', $time);

		//loop thru all messages and execute prepared insert statement
		foreach ($messages as $m)
		{
			$title=$m['title'];
			$message=$m['message'];
			$time=$m['time'];

			//Execute Statement
			$stmt->execute();
		}

		//select all data from file db messages table
		$result = $fileDb->query('Select * FROM messages');
		foreach ($result as $row)
		{
			echo 'Id:' . $row['id'] . '<br />';
			echo 'Title:' . $row['title'] .'<br />';
			echo 'Message:' . $row['message'] .'<br/>';
			echo 'Time: ' . $row['time'] .'</br>';
			echo '<br />';
		}
		//close db connection
		$fileDb = null;
		echo "All Done";
		*/
		echo 'Tables all setup!';
	}
	catch(PDOExeption $e)
	{
		echo $e->getMessage();
	}
