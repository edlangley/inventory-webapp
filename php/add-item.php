<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
        <head>
                <meta name="generator"
                      content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org">
                <title></title>
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
                <script language="JavaScript"
                      type="text/javascript">
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
                </script><br>
                <?php
                        include("admin-auth.php");
                        // database is now selected and connected - index is $conn

                        //add the item to the db
                        $name = $_GET["name"];
                        $description = $_GET["description"];
                        $quantity = $_GET["quantity"];
                        $cat_id = $_GET["cat_id"];

                        $itemquery = "INSERT INTO item (name, extra_desc, quantity, cat_id)
                         VALUES ('$name','$description','$quantity','$cat_id')";

                        if(mysql_query($itemquery, $conn))
                        {
                                echo "</form>";
                                echo "Item successfully added to the database";
                                echo "<br><br>";
                                include("view-items-category-form.php");
                        }
                        else
                        {
                                echo "Error, item was not added";
                                echo "<input type='submit' value = 'Go Back'/></form>";
                        }


                ?>
        </body>
</html>
