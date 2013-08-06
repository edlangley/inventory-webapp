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
    document.write("<form name='confirmation' action = 'new-seller.php' method='GET'>");
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

    //check seller username does not already exist:
    $sellerquery = "SELECT * FROM seller WHERE user_name = '".$_GET["user_name"]."'";
    $seller_list = mysql_query($sellerquery, $conn);// or die(mysql_error());
    $num_rows = mysql_num_rows($seller_list);
    //echo "num rows $num_rows";
	if(mysql_num_rows($seller_list) != 0)
    {
        echo "Seller username is already in use<br>";
        echo "<input type='submit' value = 'Make Changes'/>";
		exit;
    }
    $user_name = $_GET["user_name"];
    $password = $_GET["password"];
    $email = $_GET["email"];
    $fname = $_GET["fname"];
    $sname = $_GET["sname"];
    $ccard_type = $_GET["ccard_type"];
    $ccard_number = $_GET["ccard_number"];
    $ccard_exp_date = $_GET["ccard_exp_date"];
    $ccard_issue_number = $_GET["ccard_issue_number"];
    $insertsellerquery = "INSERT INTO seller (user_name, password, email, fname, sname,
    ccard_type, ccard_number,  ccard_exp_date, ccard_issue_num) VALUES ('$user_name',
    '$password', '$email', '$fname', '$sname', '$ccard_type', '$ccard_number',
    '$ccard_exp_date', '$ccard_issue_number');";

    if(mysql_query($insertsellerquery, $conn))
    {
    	echo "<br>Seller successfully added to the database";
        echo "<br><a href='new-item.php?user_name=$user_name&password=$password'>
Add an advert for this seller</a>";
        echo "<br><a href='view-items.php'>View adverts</a>";
    }
    else
    {
    	echo "<br>Error, seller was not added";
        echo "<input type='submit' value = 'Go Back'/>";
    }
?>
</form>
</body>

</html>