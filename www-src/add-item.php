<html>

<head>
  <title></title>

</head>

<body>
<h1>Eds Classifieds</h1>
<hr>
<script language="JavaScript">
<!--
    // insert parameters into a hidden form in order to pass them back if need be
    //split the parameter string up into an array of name=value pairs
    paramitems = location.search.substr(1).split("&");
    document.write("<form name='confirmation' action = 'new-item.php' method='GET'>");
	for(i=0; i<paramitems.length; i++)
	{
		myPos = paramitems[i].indexOf("=");
		document.write("<input type=\"text\" name=\"" + paramitems[i].substring(0,myPos) + "\">");
		document.confirmation.elements[i].value =((paramitems[i].substring(myPos+1)));
		document.confirmation.elements[i].style.visibility = "hidden";
	}

    //paramitems[5].replace(new RegExp("+")," ");
    // finish form off further down -->
</script>
<br>
<?php
	include("admin-auth.php");
    // database is now selected and connected - index is $conn

    //verify seller username and password:
    $sellerquery = "SELECT * FROM seller WHERE user_name = '".$_GET["user_name"].
    "' AND password = '".$_GET["password"]."'";
    $seller_list = mysql_query($sellerquery, $conn);// or die(mysql_error());
    $num_rows = mysql_num_rows($seller_list);
    //echo "num rows $num_rows";
	if(mysql_num_rows($seller_list) == 0)
    {
        echo "Invalid Seller username and/or password<br>";
        echo "<input type='submit' value = 'Make Changes'/>";
		exit;
    }
    else
    {
        $seller_row = mysql_fetch_array($seller_list);
        $seller_id = $seller_row["id"];
    }
    //add the item to the db
    $name = $_GET["name"];
    $description = $_GET["description"];
    $price = $_GET["price"];
    $cat_id = $_GET["cat_id"];
    // sort out date string
    $date_array = getdate();
    $entry_date = $date_array["year"];
    $entry_date .= "-".$date_array["mon"];
    $entry_date .= "-".$date_array["mday"];
    $entry_date .= " ".$date_array["hours"];
    $entry_date .= ":".$date_array["minutes"];
    $entry_date .= ":".$date_array["seconds"];

    //$entry_date = $_GET["entry_date"];

    $itemquery = "INSERT INTO item (name, description, price, cat_id,
    entry_date, seller_id) VALUES ('$name','$description','$price','$cat_id',
    '$entry_date', '$seller_id')";

    if(mysql_query($itemquery, $conn))
    {
    	echo "Item successfully added to the database";
        echo "<br><a href='view-items.php'>View adverts</a>";
    }
    else
    {
    	echo "Error, item was not added";
        echo "<input type='submit' value = 'Go Back'/>";
    }


?>

</form>
</body>

</html>