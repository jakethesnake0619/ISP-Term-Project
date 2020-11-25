<!DOCTYPE html>
<html>
<head>
    <title> Shopping Cart </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<?php include "header.php"; ?>

<body>

<h1 class = "carth1"> Shopping Cart </h1>

<?php
    
    $db = mysqli_connect("localhost", "root", "", "isp");

    $cartpage = mysqli_query($db, "SELECT id FROM cart ORDER BY id");
    while($row = $cartpage->fetch_assoc()) {
        if(isset($_GET[$row["id"]])) {
            mysqli_query($db, "UPDATE cart SET quantity = quantity - 1 WHERE id = " . $row["id"] . ";");
            mysqli_query($db, "UPDATE mainpage SET quantity = quantity + 1 WHERE id = " . $row["id"] . ";");
            header("Location: http://localhost/isp/prj/cart.php");
        }
    }

    $cartpage = mysqli_query($db, "SELECT * FROM cart ORDER BY ID");
    print '<form action = "http://localhost/isp/prj/cart.php" method = "get">';
    print "<table id = 'carttable'>";
    ?>

    <th> Product Name </th>
    <th> Description </th>
    <th> Price </th>
    <th> Quantity </th>
    <th> Action </th>

    <?php
    while($row = $cartpage->fetch_assoc()) {
        if($row["quantity"] > 0) {
            print "<tr>";
            print "<td>" . $row["name"] . "</td>";
            print "<td>";
            print "<div class='description'> <span>Hover To View</span><div class='description-content'><p>" . $row["description"] . "</p></div></div>";
            print "</td>";
            print "<td>" . "$" . $row["price"] . "</td>";
            print "<td>" . $row["quantity"] . "</td>";
            print "<td>";
            print "<input type = 'submit' class = 'cartlist' value = 'Remove From Cart' name = '" . $row["id"] . "'/>";
            print " </td>";
            print "</tr>";
        }
    }

    print "</table><br/>";

    $cartpage = mysqli_query($db, "SELECT * FROM cart ORDER BY ID");
    print '<input type = "submit" class = "removeAll" value = "Remove All" name = "all">';
    if(isset($_GET["all"])) {
        header("Location: http://localhost/isp/prj/removeall.php");
    }    
    print "</form>";
?>
<br>

<form action = "http://localhost/isp/prj/checkout.php" method = "get">
    <input type = "submit" class = "checkout" value = "Checkout"/>
</form>

<br/><br/><br/>

<?php include "footer.php"?>

</body>
</html>

