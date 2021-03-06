<head>
    <title>Checkout</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<?php include "header.php"?>

<?php 
    $db = mysqli_connect("localhost:3306", "root", "", "isp");
    $items = mysqli_query($db, "SELECT * FROM cart WHERE quantity!=0");
    $results = mysqli_fetch_all($items, MYSQLI_ASSOC);
    $tot=0;
    foreach($results as $item)
    {
        $tot += $item['price'] * $item['quantity'];
    }
    if(isset($_POST['submit']))
    {
        $first = mysqli_real_escape_string($db,$_POST['fname']);
        $second =mysqli_real_escape_string($db, $_POST['lname']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $addy = mysqli_real_escape_string($db,$_POST['address']);
        $city =mysqli_real_escape_string($db,$_POST['city']);
        $state = mysqli_real_escape_string($db,$_POST['state']);
        $zipcode = mysqli_real_escape_string($db,$_POST['zipcode']);
        $phone = mysqli_real_escape_string($db,$_POST['phone']);

    $push = "INSERT INTO users(fname,lname,email,addy,city,Stat,zipcode,phone) VALUES
    ('$first', '$second','$email','$addy','$city','$state','$zipcode','$phone')";
        if(mysqli_query($db,$push))
        {
            $removeq = "UPDATE cart SET quantity =0;";
            mysqli_query($db,$removeq);
            header('Location: confirmation.php');
        }
        else
        {
            echo "query error".mysqli_error($db);
        } 
    }       
?>
<body>
    <p class = "center" id= "heading">Order Checkout</p>
    <div class = "salesum">
        <div id = "user-info">
            <form action= "checkout.php" method="POST" id = "checkoutform">
                <label>First name</label><br/>
                <input  class ="userinfo" type = "text" name='fname' required><br/>
                <label>Last name</label><br/>
                <input class= "userinfo" type = "text" name = 'lname'required><br/>
                <label>Email</label><br/>
                <input class= "userinfo" type = "text" name = 'email' required><br/>
                <label>Address</label><br/>
                <input class= "userinfo" type = "text" name = 'address' required><br/>
                <label>City</label><br/>
                <input class= "userinfo" type = "text" name = 'city' required><br/>
                <label>State</label><br/>
                <input class= "userinfo" type = "text" name = 'state' required><br/>
                <label>Zipcode</label><br/>
                <input class= "userinfo" type = "number"  name = 'zipcode' min = '10000' max = '99999' required><br/>
                <label>Phone Number</label><br/>
                <input class= "userinfo" type = "text" name = 'phone' required><br/>
                <br/>
                <input type = "submit" name = "submit" value = "Check out" >
                <br/>
            </form>
        </div>
        <div id = "summaryt">
            <h1>Summary</h1>
            <table class = "summary_table">
                <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                </tr>
                    <?php  if(sizeof($results)!=0):?>
                    <?php foreach($results as $item):?>
                        <tr> 
                            <td><?php echo $item['name'];?></td>
                            <td><?php echo 'x'.$item['quantity'];?></td>
                            <td><?php echo '$'.($item['quantity']*$item['price']);?></td>
                        </tr>
                    <?php endforeach ?>  
                    <?php else:?>
                        <td colspan="3">Empty Cart</td>
                    <?php endif;?>     
                <tr>
                    <th>Total</th>
                    <hr/>
                    <td colspan="2"><?php echo "$" . $tot; ?></td>
                 </tr>          
            </table> 
        </div>
    </div>
</body>



<?php include "footer.php"?>
