<?php
	date_default_timezone_set('UTC');
	
	try 
	{
		// create databases and open connections
		// Create (connect to SQLite Database in file)
		$fileDb = new PDO('sqlite:message.sqlite3');
		//set erromode to exceptions
		$fileDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//create tables
		$fileDb->exec("CREATE TABLE IF NOT EXISTS messages (id INTEGER PRIMARY KEY, title TEXT, message TEXT, time INTEGER)");
		
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
	}
	catch(PDOExeption $e)
	{
		echo $e->getMessage();
	}