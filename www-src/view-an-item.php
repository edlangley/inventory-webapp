<html>

<head>
  <title></title>
</head>

<body>
<?php
	include("admin-auth.php");
    // database is now selected and connected - index is $conn
?>
<h1>Eds Classifieds</h1>
<hr>
<?php
    $item_id = $_GET["id"];
    $itemquery = "SELECT * FROM item WHERE id ='".$item_id."';";
    $item_list = mysql_query($itemquery, $conn) or die(mysql_error());
    if(mysql_num_rows($item_list) > 0)
    {
    	$item_row = mysql_fetch_array($item_list);
        echo "<table>";
        echo "<tr><td>Advert Id:</td><td>".$item_row["id"]."</td></tr>";
        echo "<tr><td>Advert title:</td><td>".$item_row["name"]."</td></tr>";
        echo "<tr><td>Advert description:</td><td>".$item_row["description"]."</td></tr>";
        echo "<tr><td>Advert picture name (if included):</td><td>".$item_row["picname"]."</td></tr>";
        echo "<tr><td>Advertised price:</td><td>".$item_row["price"]."</td></tr>";

        //get cat name to show
        $cat_query = "SELECT cat_name FROM category where id = ".$item_row["cat_id"];
        $cat_list = mysql_query($cat_query, $conn) or die(mysql_error());
        $cat_row = mysql_fetch_array($cat_list);
        $cat_name = $cat_row["cat_name"];
        echo "<tr><td>Category of Advert:</td><td>".$cat_name."</td></tr>";

        //present o or 1 as yes or no
        if($item_row["sold"] == 0)
        	echo "<tr><td>Item sold yet?:</td><td>No</td></tr>";
        else
            echo "<tr><td>Item sold yet?:</td><td>Yes</td></tr>";

        echo "<tr><td>Advert entry date:</td><td>".$item_row["entry_date"]."</td></tr>";

        //get user name to show
        $seller_query = "SELECT user_name FROM seller where id = ".$item_row["seller_id"];
        $seller_list = mysql_query($seller_query, $conn) or die(mysql_error());
        $seller_row = mysql_fetch_array($seller_list);
        $seller_name = $seller_row["user_name"];
        echo "<tr><td>Seller user name:</td><td>".$seller_name."</td></tr>";
        echo "</table><br>";
    }
    else
    {
    	echo "Error, item not found<br>";
    }
    echo "<a href='view-items.php'>Back to advert list</a>";
?>

</body>

</html>