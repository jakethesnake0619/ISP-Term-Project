<!DOCTYPE html>
<html>

<head>
	<title>Main Page</title>
	<link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<?php include "header.php"?>

<body>
<br/>
<br/>
<?php
	$db = mysqli_connect("localhost:3306", "root", "", "isp");

	$mainpage = mysqli_query($db, "SELECT id FROM mainpage ORDER BY id");
	while($row = $mainpage->fetch_assoc()) {
		if(isset($_GET[$row["id"]])) {
			mysqli_query($db, "UPDATE cart SET quantity = quantity + 1 WHERE id = " . $row["id"] . ";");
			mysqli_query($db, "UPDATE mainpage SET quantity = quantity - 1 WHERE id = " . $row["id"] . ";");
			header("Location: http://localhost/isp/prj/prj.php");
		}
	}

	$mainpage = mysqli_query($db, "SELECT * FROM mainpage ORDER BY id");
	print '<form action = "http://localhost/isp/prj/prj.php" method = "get">';
	print "<table id = 'maintable'>";
	?>
		<th> Product Image </th>
        <th> Product Name </th>
        <th> Description </th>
        <th> Price </th>
        <th> Quantity </th>
        <th> Add To Cart </th>
	<?php
	while($row = $mainpage->fetch_assoc()) {
		if($row["quantity"] > 0) {
			print "<tr>";
			print "<td> <img src = '" . $row["image"] . "' /></td>";
			print "<td>" . $row["name"] . "</td>";
			print "<td>";
			print "<div class='description'> <span>Hover To View</span><div class='description-content'><p>" . $row["description"] . "</p></div></div>";
			print "</td>";
			print "<td>" . "$" . $row["price"] . "</td>";
			print "<td>" . $row["quantity"] . "</td>";
			print "<td>"; 
			print '<input type = "submit" class = "mainlist" value = "Add To Cart" name = "' . $row["id"] . '"/>';
			print "</td>";
			print "</tr>";
		}
	}
	print "</table>";
	print "</form>";

	print "<br/><br/><br/>";

	include "footer.php";
?>
</body>
</html>
