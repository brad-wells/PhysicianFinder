<!--
Brad Wells
CIS 247.2261
2/24/19
Assignment 3

This application uses php and Mysql to view, add, edit, and delete physicians and 
clinics from a website.
-->


<?php

//add to portfolio

require_once('database.php');

//get category id

if (!isset($clinicID))
{
	$clinicID = filter_input(INPUT_GET,'clinicID',
	FILTER_VALIDATE_INT);
	
	If($clinicID == NULL || $clinicID == FALSE)
	{
		$clinicID = 1;
	}
		
}

// get name for selected category

$queryCategory = 'SELECT * FROM clinic
				  WHERE clinicID = :clinicID';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':clinicID',$clinicID);
$statement1->execute();
$category = $statement1->fetch();
$clinicName = $category['clinicName'];
$statement1->closeCursor();

//get all categories

$query = 'SELECT * FROM clinic
			ORDER BY clinicID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

//get products for selected category
$queryPhysician = 'SELECT * FROM physician
					WHERE clinicID = :clinicID
					ORDER BY clinicID';
$statement3 = $db->prepare($queryPhysician);
$statement3->bindValue(':clinicID',$clinicID);
$statement3->execute();
$physician = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Assignment 3</title>
	<link rel="stylesheet" type="text/css" href="main.css" />

</head>

<body>
	<h1>Physician Finder</h1>

	<main>
		
		
		<aside>
		
			<h2>Clinics<h2>
			<nav>
			<ul>
				<?php foreach($categories as $category) :?>
				<li><a href=".?clinicID=<?php echo $category['clinicID']; ?>">
						<?php echo $category['clinicName']; ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			</nav>
		</aside>
		
		
		<section>
		<!--display the table of physicians -->
		
		<h3> <?php echo $clinicName; ?></h2>
		<table>
			<tr>
				<th>Physician ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Clinic ID</th>
				<th>&nbsp;</th>
			</tr>
			
			<?php foreach ($physician as $physicians) : ?>
			<tr>
				<td><?php echo $physicians['physicianID']; ?></td>
				<td><?php echo $physicians['physicianFirstName']; ?></td>
				<td><?php echo $physicians['physicianLastname']; ?></td>
				<td><?php echo $physicians['clinicID']; ?></td>
				<td><form action="delete_product.php" method="post">
					<input type="hidden" name="physician_id"
							value="<?php echo $physicians['physicianID'];?>">
					<input type="hidden" name="clinic_id"
							value="<?php echo $physicians['clinicID']; ?>">
					<input type="submit" value="Delete">
				</form></td>
				
				<td><form action="edit_product_form.php" method="post">
					<input type="hidden" name="physician_id"
							value="<?php echo $physicians['physicianID'];?>">
							
					<input type="hidden" name="clinic_id"
							value="<?php echo $physicians['clinicID']; ?>">
					
					<input type="hidden" name="physician_first_name"
							value="<?php echo $physicians['physicianFirstName']; ?>">
							
					<input type="hidden" name="physician_last_name"
							value="<?php echo $physicians['physicianLastname']; ?>">

							
							
					<input type="submit" value="Edit">
				</form></td>
				
				
			</tr>
			<?php endforeach; ?>
		</table>
		<p><a href="add_physician_form.php">Add Physician</a></p>
			
		</section>
			
	</main>
					

</body>





</html>
























