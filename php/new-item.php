<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
        <head>
                <meta name="generator"
                      content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org">
                <title></title>
                <script language="JavaScript"
                      type="text/javascript">
<!--
                //validate the entry form
                function checkForm()
                {
                if(itemform.name.value.length == 0)
                {
                        alert("Please enter an Item Name");
                        return false;
                }

                //        if( (itemform.quantity.value.length == 0)
                //        {
                //              alert("Please enter an item quantity");
                //              return false;
                //      }
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
                                if(paramitems[i].indexOf("%2B") == -1)
                                        document.itemform.elements[i].value = (paramitems[i].substring(myPos+1));
                                else
                                {
                                        var params2 = paramitems[i].substring(myPos+1).split("%2B");
                                        for(var j = 0; j<params2.length; j++)
                                        {
                                                document.itemform.elements[i].value += params2[j]+ " ";
                                        }
                                }
                        }
                }
                }
                // -->
                </script>
        </head>
        <body>
                <?php
                        include("site-title.php");
                        include("admin-auth.php");
                    // database is now selected and connected - index is $conn
                ?>
                <h1>
                        <?php echo $site_title; ?>
                </h1>
                <hr>
                <form name="itemform"
                      action="add-item.php"
                      method="get"
                      onsubmit="return checkForm()"
                      id="itemform">
                        <table>
                                <tr>
                                        <td>
                                                Item Name:
                                        </td>
                                        <td>
                                                <input type="text"
                                                    size="30"
                                                    name="name">
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                Item Description:
                                        </td>
                                        <td>
                                                <textarea name="description"
                                                    rows="10"
                                                    cols="30">
</textarea>
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                Item Quantity:
                                        </td>
                                        <td>
                                                <input type="text"
                                                    size="5"
                                                    name="quantity">
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                Item Category:
                                        </td>
                                        <td>
                                                <select name="cat_id">
                                                        <?php
                                                                $cat_query = "SELECT * FROM category";
                                                                $cat_list = mysql_query($cat_query, $conn) or die(mysql_error());
                                                                while($cat_row = mysql_fetch_array($cat_list))
                                                                {
                                                                        $cat_id = $cat_row["cat_id"];
                                                                        $cat_name = $cat_row["cat_name"];
                                                                        echo"<option value= $cat_id > $cat_name </option>\n";
                                                                }
                                                        ?>
                                                </select>
                                        </td>
                                </tr>
                                <tr>
                                        <td></td>
                                        <td>
                                                <input type="submit"
                                                    value="Add Item"><input type="reset">
                                        </td>
                                </tr>
                        </table>
                </form><script language="JavaScript"
                      type="text/javascript">
check_for_params();
                </script>
        </body>
</html>
