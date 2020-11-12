

<?php include "header.php"?>

<body>
<!--All items are displayed here-->

<?php
	$db = mysqli_connect("localhost:3306", "root", "", "isp");

	$mainpage = mysqli_query($db, "SELECT id FROM mainpage ORDER BY id");
	while($row = $mainpage->fetch_assoc()) {
		if(isset($_GET[$row["id"]])) {
			mysqli_query($db, "UPDATE cart SET quantity = quantity + 1 WHERE id = " . $row["id"] . ";");
			mysqli_query($db, "UPDATE mainpage SET quantity = quantity - 1 WHERE id = " . $row["id"] . ";");
		}
	}

	$mainpage = mysqli_query($db, "SELECT * FROM mainpage ORDER BY id");
	print '<form action = "http://localhost/isp/prj/prj.php" method = "get">';
	print "<table class = 'center'>";
	?>
        <th> Product Name </th>
        <th> Price </th>
        <th> Quantity </th>
        <th> Add To Cart </th>
	<?php
	while($row = $mainpage->fetch_assoc()) {
		if($row["quantity"] > 0) {
			print "<tr>";
			print "<td>" . $row["name"] . "</td>";
			print "<td>" . "$" . $row["price"] . "</td>";
			print "<td>" . $row["quantity"] . "</td>";
			print "<td>"; 
			print '<div id = "add"><input type = "submit" value = "Add To Cart" name = "' . $row["id"] . '"/> </div>';
			print " </td>";
			print "</tr>";
		}
	}
	print "</table>";
	print "</form>";
?>

</body>



<?php include "footer.php"?>
</html>
