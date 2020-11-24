<?php include "header.php"?>

<?php $db = mysqli_connect("localhost", "Mike", "moneyMaker1", "isp_db");

    $items = mysqli_query($db, "SELECT * FROM cart WHERE quantity!=0");

    $results = mysqli_fetch_all($items, MYSQLI_ASSOC);
    $tot=0;
    foreach($results as $item){
        $tot += $item['price'] * $item['quantity'];
    };

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
    }; 
    

    };
        
?>
<P class = "Userinfo" id= "heading">Getting your Order</P>


<form action= "checkout.php" method="POST" id ="user_info">
    <nav>
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
        <input class= "userinfo" type = "number" name = 'phone' required><br/>
        <br/> <br/>
        <!--<table class = "summary_table">
            <h1>Summary</h1>
            <th>Delivery</th>
            
           <?php //foreach($results as $item):?>
                <tr><?php// echo $item['name'];?></tr>
            <?php //endforeach ?>
        </table>-->
        <label class = "summary"> Total</label>
        <input type="number" value =<?php echo $tot; ?>>
        <input type = "submit" name = "submit" value = "Check out">
    </nav>
</form>





<?php include "footer.php"?>
