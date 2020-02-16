<?php

//get data
$clinic_id = filter_input(INPUT_POST, 'clinic_id');
$ID = filter_input(INPUT_POST,'ID');
$firstName = filter_input(INPUT_POST,'firstName');
$lastName = filter_input(INPUT_POST,'lastName');


//validate inputs
 if($clinic_id == null ||  $clinic_id == false ||
		 $ID == null || $firstName == null || $lastName == null)
 {
	 $error = "Invalid physician data. Check all fields and try again.";
	 include('database_error.php');
			
 } 
 else{
	require_once('database.php');
	
	//add physician to the database
	
	$query = 'INSERT INTO physician
				(physicianID, physicianFirstName, physicianLastname, clinicID)
			  VALUES
				(:ID, :firstName, :lastName, :clinic_id)';
	$statement = $db->prepare($query);

	$statement->bindValue(':ID',$ID);
	$statement->bindValue(':firstName',$firstName);
	$statement->bindValue(':lastName',$lastName);
	$statement->bindValue(':clinic_id', $clinic_id);
	$statement->execute();
	$statement->closeCursor();
	
	//display main page
	include('index.php');
}
?>