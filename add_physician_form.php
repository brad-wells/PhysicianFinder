<?php
require('database.php');
$query = 'SELECT *
		  FROM clinic ORDER BY clinicID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
<div align="center">
  <div id="formParent" align="center">

  
		<form action="add_physician.php" method ="post"
			id="add_physician_form">
			
			<label>Clinic:</label>
			
			
			<select name="clinic_id">
			<?php foreach ($categories as $clinic) : ?>
			  <option value="<?php echo $clinic['clinicID']; ?>">
				<?php echo $clinic['clinicName']; ?>
			  </option>
			  
			<?php endforeach; ?>
			</select><br>
			
			<label>ID number:</label>
			<input type="text" name="ID"><br>
			
			<label>First name:</label>
			<input type="text" name="firstName"><br>
			
			<label>Last name:</label>
			<input type="text" name="lastName"><br>
			

			
			<label>&nbsp;</label>
			<input id="right" type ="submit" value="Add Physician" ><br>
			
            <!-- <label>Clinic:</label>
			<input type="text" name="clinic"><br>
			-->
		</form>
		</div>
		<p><a href="index.php">View Physician List</a></p>
			
  

</div>
</body>






</html>