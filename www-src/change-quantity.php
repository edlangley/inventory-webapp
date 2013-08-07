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
    $new_quantity = $_GET["quantity"];
    $changequantityquery = "UPDATE item SET quantity = '".$new_quantity."' WHERE id = '"
    .$item_id."';";
    if(mysql_query($changequantityquery, $conn))
    {
    	echo "Item quantity successfully changed.";
    }
    else
    {
    	echo "Error, item quantity not changed.";
    }
    echo "<br><a href='view-items.php'>Back to item list</a>";
?>
</body>
</html>