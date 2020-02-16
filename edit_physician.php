<?php

//get data
$physician_id = filter_input(INPUT_POST,'physician_id');
$physician_first_name = filter_input(INPUT_POST,'physician_first_name');
$physician_last_name = filter_input(INPUT_POST, 'physician_last_name');
$clinic_id = filter_input(INPUT_POST, 'clinic_id');






require_once('database.php');

$querydelete = 'DELETE FROM physician WHERE
				physicianID = :physician_id';

$query = 'INSERT INTO physician 
			(physicianID, physicianFirstName, physicianLastname, clinicID)
			VALUES
			(:physician_id, :physician_first_name, :physician_last_name, :clinic_id)';
			
			
$delete = $db->prepare($querydelete);
$delete->bindValue(':physician_id', $physician_id);
$delete->execute();
$delete->closeCursor();			
			
			
			
			
			
$statement = $db->prepare($query);

$statement->bindValue(':physician_id', $physician_id);
$statement->bindValue(':physician_first_name', $physician_first_name);
$statement->bindValue(':physician_last_name', $physician_last_name);
$statement->bindValue(':clinic_id', $clinic_id);
$success = $statement->execute();
$statement->closeCursor();



include('index.php');         //how to return to page where edit was made


?>
<!-- <html>
<label>ID: <?php echo $physician_id; ?></label>
<label>name: <?php echo $physician_first_name; ?></label>
<label> <?php echo $physician_last_name; ?></label>
<label>clinic num <?php echo $clinic_id; ?></label>
<label>success <?php echo $success; ?></label>




</html> -->




