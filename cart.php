<html>
<head>
  <title> Shopping Cart </title>
  <style type = "text/css">
  td, th, table {border: thin solid black;}
  </style>
</head>

<body>

<h1> Shopping Cart </h1>

<?php
  $db = mysqli_connect("localhost", "root", "", "term2");

  $cartpage = mysqli_query($db, "SELECT id FROM cart ORDER BY id");
  while($row = $cartpage->fetch_assoc()) {
    if(isset($_GET[$row["id"]])) {
      mysqli_query($db, "UPDATE cart SET quantity = quantity - 1 WHERE id = " . $row["id"] . ";");
      mysqli_query($db, "UPDATE main SET quantity = quantity + 1 WHERE id = " . $row["id"] . ";");
    }
  }

  $cartpage = mysqli_query($db, "SELECT * FROM cart ORDER BY ID");
  print '<form action = "http://localhost/isp/cart.php" method = "get">';
  print "<table class = 'center'>";
  ?>
  <th> Product Name </th>
  <th> Price </th>
  <th> Quantity </th>
  <th> Action </th>

  <?php
  while($row = $cartpage->fetch_assoc()) {
    if($row["quantity"] > 0) {
      print "<tr>";
      print "<td>" . $row["name"] . "</td>";
      print "<td>" . "$" . $row["price"] . "</td>";
      print "<td>" . $row["quantity"] . "</td>";
      print "<td>";
      print '<div id = "sub"><input type = "submit" value = "Remove From Cart" name = "' . $row["id"] . '"/> </div>';
      print " </td>";
      print "</tr>";
    }
  }



    $cartpage = mysqli_query($db, "SELECT * FROM cart ORDER BY ID");
    print '<div id = "all"><input type = "submit" value = "Remove All" name = "all"> </div>';
    if(isset($_GET["all"])) {
      while($row = $cartpage->fetch_assoc()) {
        $quant = $row['quantity'];
          mysqli_query($db, "UPDATE cart SET quantity = quantity - $quant WHERE id =" . $row["id"] . ";");
          mysqli_query($db, "UPDATE main SET quantity = quantity + $quant WHERE id =" . $row["id"] . ";");
        }
        header("Location: http://localhost/isp/cart.php");
    }
    print "</table";
    print "</form>";
    ?>



</body>
</html>


