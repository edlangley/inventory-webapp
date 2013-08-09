<html>

<head>
  <title></title>
<script language="JavaScript">
<!--
	//validate the entry form
	function checkForm()
	{
    		if(categoryform.cat_name.value.length == 0)
        	{
        		alert("Please enter a Category Name");
        		return false;
        	}
	}
// -->
</script>
</head>

<body>
<?php
	include("site_title.php");
	include("admin-auth.php");
	// database is now selected and connected - index is $conn
?>
<h1><?php echo $site_title; ?></h1>
<hr>
<form name="categoryform" action="add-cat.php" method="get" onsubmit="return checkForm()">
<table>
<tr><td>Category name:</td><td><input type="text" name="cat_name" /></td></tr>
<tr><td></td><td><input type="submit" value="Add" /></td></tr>
</table>

</form>
</body>

</html>
