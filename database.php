<?php
	 // $dsn = 'db5000089532.hosting-data.io;dbname=dbs84234';
	 // $username = 'dbu288521';
	 // $password = 'Assignment3!';
	
	 // try
	 // {
		 // $db = new PDO($dsn, $username, $password);
	 // }
	 // catch (PDOException $e)
	 // {
		 // $error_message = $e->getMessage();
		 // include('database_error.php');
		 // exit();
	 // }
	 
	 
  $host_name = 'db5000089532.hosting-data.io';
  $database = 'dbs84234';
  $user_name = 'dbu288521';
  $password = 'Assignment3!';
  $db = null;

  try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }

	
	
	
	
  // $host_name = 'db5000089532.hosting-data.io';
  // $database = 'dbs84234';
  // $user_name = 'dbu288521';
  // $password = 'Assignment3!';
  // $connect = mysql_connect($host_name, $user_name, $password, $database);

  // if (mysql_errno()) {
    // die('<p>Failed to connect to MySQL: '.mysql_error().'</p>');
  // } else {
    // echo '<p>Connection to MySQL server successfully established.</p >';
  // }

?>