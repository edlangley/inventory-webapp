<html>

<head>
  <title></title>
</head>

<body>
<h1>Eds Classifieds</h1>
<hr>
<?php
    include("admin-auth.php");
    // database is now selected and connected - index is $conn
    $catquery = "INSERT INTO category (cat_name) VALUES ('".$_GET["cat_name"]."');";
    if(mysql_query($catquery, $conn))
    {
    	echo "Category successfully added";
        echo "<br><a href='view-items.php'>View adverts</a>";
    }
    else
    {
    	echo "Error, category not added";
        echo "<br><a href='mew-cat.php'>Go back</a>";
    }
?>

</body>

</html>