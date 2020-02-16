<!DOCTYPE html>
<html>

<head>
	<title>Asg3</title>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>


<body>
	<header><p id="left">Assignment 3</p></header>
	
	<main>
		<p id="left">Database Error</p>
		<p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>MySQL must be running as described in chapter 1.</p>
        <p>Error message: <?php echo $error; ?></p>
        <p>&nbsp;</p>
	</main>
	
	<footer>
		<p>&copy; <?php echo date("Y"); ?> Assignment 3</p>
	</footer>

</body>
</html>