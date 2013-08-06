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
<form action = "view-items.php" method = "get">
View Adverts in:
<select name = "category">
<?php
    //get category list and and if done set the previously selected one
    $sqlquery = "SELECT id, cat_name FROM category";
	$result = mysql_query($sqlquery);

    if(!isset($_GET["category"]))
    {
    	$selected_cat = 0;
    }
    else
    {
        $selected_cat = $_GET["category"];
    }

    if($selected_cat == 0)
    {
    	echo "<option value=0 selected>All</option>";
    }
    else
    {
        echo "<option value=0>All</option>";
    }

	while($cat_list = mysql_fetch_array($result))
	{
		$name = $cat_list["cat_name"];
		$value = $cat_list["id"];

		echo "<option value = $value ";
        if($selected_cat == $value)
        	echo " selected ";
        echo "> $name </option>\n";
	}
?>
</select>
<input type = "submit" value ="View">
</form>
<?php
	//find items in selected category to put in table
    $item_query = "SELECT id, name, entry_date, cat_id, price, seller_id FROM item";
    if($selected_cat == 0)
        $item_query.= ";";
    else
        $item_query.= " WHERE cat_id = $selected_cat;";
    $item_list = mysql_query($item_query, $conn) or die(mysql_error());
	$num_rows = mysql_num_rows($item_list);
    echo "Number of items in this category: $num_rows";
?>
<hr>
<table border = 1>
<tr><td>Item Name</td><td>Entry date</td><td>Category</td><td>Price(£)</td><td>Seller</td>
<td colspan = '2'>Action on this item</td></tr>
<!--<form name = "items_checked" method ="get"> -->
<?php
	// list out the items in the category in a table
    while($item_row = mysql_fetch_array($item_list))
    {
        $item_id = $item_row["id"];
        echo "<tr>";
		$name = $item_row["name"];
		echo "<td><a href = 'view-an-item.php?id=$item_id'> $name </a></td>";

		$entry_date = $item_row["entry_date"];
		echo "<td> $entry_date </td>";

        // get name out of category table
        //$cat_id = $item_row["cat_id"];
        $cat_query = "SELECT cat_name FROM category where id = ".$item_row["cat_id"];
        $cat_list = mysql_query($cat_query, $conn) or die(mysql_error());
        $cat_row = mysql_fetch_array($cat_list);
        $cat_name = $cat_row["cat_name"];
		echo "<td> $cat_name </td>";

		$price = $item_row["price"];
		echo "<td> $price </td>";

        // show seller name instead of id **********
        $seller_query = "SELECT user_name FROM seller where id = ".$item_row["seller_id"];
        $seller_list = mysql_query($seller_query, $conn) or die(mysql_error());
        $seller_row = mysql_fetch_array($seller_list);
        $seller_name = $seller_row["user_name"];
        //$seller_id = $item_row["seller_id"];
        echo "<td> $seller_name </td>";

        //remove link:
        echo "<td><form action='delete-item.php' name = 'delete' method ='get'>";
        echo "<input type='hidden' size='0' name='item_id' value='$item_id' />";
        echo "<input type='submit' value='Remove' />";
		echo "</form></td>";

        //move to:
        echo "<td><form action='move-item.php' name = 'move' method ='get'>";
        echo "<input type='hidden' size ='0' name='item_id' value='$item_id' />";
        echo "Move to:";
        echo "<select name = 'category'>";
        //simply put categories in another select box
    	$catquery = "SELECT id, cat_name FROM category";
		$cat_list = mysql_query($catquery);
    	while($cat_row = mysql_fetch_array($cat_list))
		{
			$name = $cat_row["cat_name"];
			$value = $cat_row["id"];
			echo "<option value = $value > $name </option>\n";
		}
        echo "</select>";
        echo "<input type='submit' value='Move' />";
		echo "</form></td>";

		echo "</tr>";
    }
?>
</table>
<br>

<?php
    //simply put categories in another select box
    /*$catquery = "SELECT id, cat_name FROM category";
	$cat_list = mysql_query($catquery);
    while($cat_row = mysql_fetch_array($cat_list))
	{
		$name = $cat_row["cat_name"];
		$value = $cat_row["id"];

		echo "<option value = $value > $name </option>\n";
	}*/
?>
<br>


</body>

</html>