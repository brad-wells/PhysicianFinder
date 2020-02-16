<?php
require_once('database.php');

//get ids
$physician_id = filter_input(INPUT_POST, 'physician_id', FILTER_VALIDATE_INT);
$clinic_id = filter_input(INPUT_POST, 'clinic_id', FILTER_VALIDATE_INT);


//delete from the database
if ($physician_id != false && $clinic_id != false){
	$query = 'DELETE FROM physician
			  WHERE physicianID = :physician_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':physician_id', $physician_id);
	$success = $statement->execute();
	$statement->closeCursor();
}

//display the product list page
include('index.php');