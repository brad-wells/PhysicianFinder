<?php
require_once('database.php');

//get ids
$physician_id = filter_input(INPUT_POST, 'physician_id', FILTER_VALIDATE_INT);
$clinic_id = filter_input(INPUT_POST, 'clinic_id',FILTER_VALIDATE_INT);
$physician_first_name = filter_input(INPUT_POST, 'physician_first_name');
$physician_last_name = filter_input(INPUT_POST, 'physician_last_name');
$clinicName = "";

$query = 'SELECT * FROM physician 
		  WHERE physicianID = :physician_id
		  AND clinicID = :clinic_id
		  AND physicianFirstName = :physician_first_name
		  AND physicianLastname = :physician_last_name';
		  
$clinicIDQuery = 'SELECT * FROM clinic ORDER BY clinicID';
$physicianQuery = 'SELECT * FROM physician WHERE physicianFirstName = :physician_first_name 
					AND physicianLastname = :physician_last_name';

$statement = $db->prepare($query);		
$statement->bindValue(':physician_id', $physician_id);
$statement->bindValue(':clinic_id', $clinic_id);
$statement->bindValue(':physician_first_name',$physician_first_name);
$statement->bindValue(':physician_last_name',$physician_last_name);

$success = $statement->execute();

$categories = $statement->fetchAll();
$statement->closeCursor();  





$statement2 = $db->prepare($clinicIDQuery);
$statement2->bindValue(':clinic_name', $clinicName);
$success2 = $statement2->execute();

$categories2 = $statement2->fetchAll();
$statement2->closeCursor();


 $statement3 = $db->prepare($physicianQuery);
 $statement3->bindValue(':physician_first_name',$physician_first_name);
 $statement3->bindValue(':physician_last_name',$physician_last_name);
 $success3 = $statement3->execute();
 $categories3 = $statement3->fetchAll();
 $statement3->closeCursor();


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<main>
<div align="center">
  <div id="formParent" align="center">
	<form action="edit_physician.php" method="post"
		id="edit_physician_form">
		
		<label id="name">Physician:</label>
		<label id="name"><?php echo $physician_id; ?></label>
		<input type = "hidden" name='physician_id' value = <?php echo $physician_id; ?>>

		<br>
		<label id="name"><?php echo $physician_first_name; ?></label>
		<input type = "hidden" name='physician_first_name' value = <?php echo $physician_first_name; ?>>

		<label id="name"><?php echo $physician_last_name; ?></label>
		<input type = "hidden" name='physician_last_name' value = <?php echo $physician_last_name; ?>>

		<br>
		<label>New Clinic:</label>
		<select name="clinic_id">
		<?php foreach ($categories2 as $clinic2) : ?>
		  <option value="<?php echo $clinic2['clinicID']; ?>">
			<?php echo $clinic2['clinicName']; ?>
		  </option>
		  
		  <?php endforeach; ?>
		</select>
		
		<br>
		<input type ="submit" value ="Edit Physician">
	</form>
	</div>
	</p><a href="index.php">View Physician List</a></p>
		
</div>
</main>

</body>

</html>