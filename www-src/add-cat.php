<html>

<head>
  <title></title>
</head>

<body>
<?php
	include("site_title.php");
	include("admin-auth.php");
	// database is now selected and connected - index is $conn
?>
<h1><?php echo $site_title; ?></h1>
<hr>
<?php
	$catquery = "INSERT INTO category (cat_name) VALUES ('".$_GET["cat_name"]."');";
	if(mysql_query($catquery, $conn))
	{
		echo "Category successfully added";
		echo "<br><a href='view-items.php'>View items</a>";
	}
	else
	{
		echo "Error, category not added";
		echo "<br><a href='new-cat.php'>Go back</a>";
	}
?>

</body>

</html>
