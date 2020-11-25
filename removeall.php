<!DOCTYPE html>
<html>

<head>
	<title>Are you sure?</title>
	<link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<?php include "header.php"?>

<body>
<?php
  print '<form action = "http://localhost/isp/prj/removeall.php" method = "get">';
?>
<br/>
<br/>
<h1> Are you sure you want to remove all items? </h1>
<br/>
<br/>
<?php
	print '<input type = "submit" class = "cartlist" value = "Cancel" name = "cancel">';
?>
<br/>
<br/>
<br/>
<?php
	print '<input type = "submit" class = "removeAll" value = "Remove All" name = "remove">';
	$db = mysqli_connect("localhost", "root", "", "isp");
	$cartpage = mysqli_query($db, "SELECT * FROM cart ORDER BY ID");
	if(isset($_GET["cancel"])) {
		header("Location: http://localhost/isp/prj/cart.php");
	}
	if(isset($_GET["remove"])) {
		while($row = $cartpage->fetch_assoc()) {
			mysqli_query($db, "UPDATE mainpage SET quantity = quantity + " . $row['quantity'] . " WHERE id =" . $row["id"] . ";");
			mysqli_query($db, "UPDATE cart SET quantity = 0 WHERE id =" . $row["id"] . ";");
		}
		header("Location: http://localhost/isp/prj/cart.php");
	}
?>

<br/><br/><br/>
<?php include "footer.php"?>

</body>
</html>
