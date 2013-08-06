<html>

<head>
  <title></title>
<script language="JavaScript">
	<!--
	//validate the entry form
	function checkForm()
    {
    	if(sellerform.user_name.value.length == 0)
        {
        	alert("Please enter a User Name");
            return false;
        }
        if(sellerform.password.value.length == 0)
        {
        	alert("Please enter a Password");
            return false;
        }
        if(sellerform.email.value.length == 0)
        {
        	alert("Please enter an Email address");
            return false;
        }
        if(sellerform.fname.value.length == 0)
        {
        	alert("Please enter sellers first name");
            return false;
        }
        if(sellerform.sname.value.length == 0)
        {
        	alert("Please enter sellers surname");
            return false;
        }
        if( (sellerform.ccard_number.value.length == 0) || isNaN(itemform.ccard_number.value))
        {
        	alert("Please enter a credit card number using only numerical digits");
            return false;
        }
        if( (sellerform.ccard_exp_date.value.length == 0) || isNaN(itemform.ccard_exp_date.value))
        {
        	alert("Please enter a credit card expiry date using only numerical digits");
            return false;
        }
        if( (sellerform.ccard_issue_number.value.length == 0) ||
        	isNaN(itemform.ccard_issue_number.value))
        {
        	alert("Please enter a credit card issue number using only numerical digits");
            return false;
        }
    }

    //Check for parameters passed back
  	function check_for_params()
	{
	 	// split the parameter string up into an array of name=value pairs
   		var paramitems = location.search.substr(1).split("&");
   		if (paramitems.length > 1)
        {
        	for(var i = 0; i<paramitems.length;i++)
            {
                var myPos = paramitems[i].indexOf("=");
				document.sellerform.elements[i].value = (paramitems[i].substring(myPos+1));
            }
        }
    }
	// -->
</script>
</head>

<body>

<?php
	include("admin-auth.php");
    // database is now selected and connected - index is $conn
?>
<h1>Eds Classifieds</h1>
<hr>
<form name="sellerform" action="add-seller.php" method="get" onsubmit="return checkForm()">
<table>
<tr><td colspan = "2">Enter sellers preferred login details:</td><td></td></tr>
<tr><td>Seller user name:</td><td><input type="text" name="user_name" /></td></tr>
<tr><td>Seller password:</td><td><input type="password" name="password" /></td></tr>
<tr><td>Email:</td><td><input type="text" size="25" name="email" /></td></tr>
<tr><td>First name:</td><td><input type="text" size="10" name="fname" /></td></tr>
<tr><td>Surname:</td><td><input type="text" size="10" name="sname" /></td></tr>
<tr><td>Credit Card type:</td><td><select name="ccard_type">
	<option value="VISA">Visa</option>
    <option value="MASTERCARD">Mastercard</option>
    <option value="AMEX">American Express</option>
    <option value="SWITCH">Switch</option>
    <option value="SOLO">Solo</option>
</select></td></tr>
<tr><td>Credit Card number:</td><td><input type="text" name="ccard_number" /></td></tr>
<tr><td>Credit Card expiry date (YYMM):</td><td><input type="text" size="4" name="ccard_exp_date" /></td></tr>
<tr><td>Credit Card issue number:</td><td><input type="text" size="2" name="ccard_issue_number" /></td></tr>

<tr><td></td><td><input type="submit" value ="Add Seller"><input type="reset"></td></tr>
</table>
</form>
<script language="JavaScript">
	check_for_params();
</script>
</body>

</html>