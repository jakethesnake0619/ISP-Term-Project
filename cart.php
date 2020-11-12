<html>
<head>
  <title> Shopping Cart </title>
  <style type = "text/css">
  td, th, table {border: thin solid black;}
  </style>
</head>

<body>
  <form action = "http://localhost/isp/cart.php"
        method = "post">

<h1> Shopping Cart </h1>
<?php
  $db = mysqli_connect("localhost", "root", "", "term2");

  $query = "SELECT * FROM cart";
  $result = mysqli_query($db,$query);

  echo "<table>";
  echo "<tr><td> ID </td>" . "<td> Product Name </td>" . "<td> Price </td>" . "<td> Quantity </td> <td> Action </td></tr>";
  while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['id'] . "</td>
    <td>" .  $row['name'] . "</td>
    <td>"  .  $row['price'] . "</td>
    <td>"  .  $row['quantity'] . "</td>
    <td><input type = 'submit' value = 'Remove from Cart' name = 'remove'> </td>" ."</tr>";
  }

  echo "</table>";

  if(array_key_exists('remove' , $_POST)) {
    removeItem();
  }

  function removeItem(){
      
  }

?>
<br>

</body>
</html>

