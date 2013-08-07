<html>
<head>
  <title></title>
</head>
<body>
<?php
	include("admin-auth.php");
    // database is now selected and connected - index is $conn
?>
<h1>Eds Electronics Inventory</h1>
<hr>
<?php
    $item_id = $_GET["item_id"];
    $moveto_cat_id = $_GET["category"];
    //echo "$moveto_cat_id";
    $moveitemquery = "UPDATE item SET cat_id = '".$moveto_cat_id."' WHERE id = '"
    .$item_id."';";
    if(mysql_query($moveitemquery, $conn))
    {
    	echo "Item successfully moved.";
    }
    else
    {
    	echo "Error, item was not moved.";
    }
    echo "<br><a href='view-items.php'>Back to item list</a>";
?>
</body>
</html>