<?php include "header.php"?>

<?php $db = mysqli_connect("localhost", "Mike", "moneyMaker1", "isp_db");

    $items = mysqli_query($db, "SELECT * FROM cart WHERE quantity!=0");

    $results = mysqli_fetch_all($items, MYSQLI_ASSOC);
    $tot=0;
    foreach($results as $item){
        $tot += $item['price'] * $item['quantity'];
    };
    
?>
<P class = "Userinfo" id= "heading">Getting your Order</P>


<form action= "checkout.php" method="POST" id = "user_info">
    <nav>
        <label>First name</label><br/>
        <input  class ="userinfo" type = "text" required><br/>
        <label>Last name</label><br/>
        <input class= "userinfo" type = "text" required><br/>
        <label>Email</label><br/>
        <input class= "userinfo" type = "text" required><br/>
        <label>Address</label><br/>
        <input class= "userinfo" type = "text" required><br/>
        <label>City</label><br/>
        <input class= "userinfo" type = "text" required><br/>
        <label>State</label><br/>
        <input class= "userinfo" type = "text" required><br/>
        <label>Zipcode</label><br/>
        <input class= "userinfo" type = "number"  min = '10000' max = '99999' required><br/>
        <label>Phone Number</label><br/>
        <input class= "userinfo" type = "number" required><br/>
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
    </nav>
</form>
<input type = "submit" value = "Check out">



<?php include "footer.php"?>
