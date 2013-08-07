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
	$cat_query = "SELECT cat_id, cat_name FROM category;";
	$cat_list = mysql_query($cat_query, $conn) or die(mysql_error());
	
	while($cat_row = mysql_fetch_array($cat_list))
	{
		$cat_id = $cat_row["cat_id"];
		$cat_name = $cat_row["cat_name"];
		echo "<b>$cat_name:</b><BR>";
		
		$item_query = "SELECT name, quantity FROM item WHERE cat_id = $cat_id;";
		$item_list = mysql_query($item_query, $conn) or die(mysql_error());

		echo "<table border = 0 width = 100%>";
	//	echo "<tr><td><b>Item name</b></td><td><b>Item quantity</b></td></tr>";
		while($item_row = mysql_fetch_array($item_list))
		{
			$item_name = $item_row["name"];
			$item_quantity = $item_row["quantity"];
			echo "<tr><td>$item_name</td><td>$item_quantity</td></tr>";
		}

		echo "</table><HR>";
	}
?>

</body>
</html>