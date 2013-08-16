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
                <?php
                        $item_id = $_GET["id"];
                        $itemquery = "SELECT * FROM item WHERE id ='".$item_id."';";
                        $item_list = mysql_query($itemquery, $conn) or die(mysql_error());
                        if(mysql_num_rows($item_list) > 0)
                        {
                                $item_row = mysql_fetch_array($item_list);
                                echo "<table>";
                                echo "<tr><td>Item ID:</td><td>".$item_row["id"]."</td></tr>";
                                echo "<tr><td>Item name:</td><td>".$item_row["name"]."</td></tr>";

                                //get cat name to show
                                $cat_query = "SELECT cat_name FROM category where cat_id = ".$item_row["cat_id"];
                                $cat_list = mysql_query($cat_query, $conn) or die(mysql_error());
                                $cat_row = mysql_fetch_array($cat_list);
                                $cat_name = $cat_row["cat_name"];
                                echo "<tr><td>Item category:</td><td>".$cat_name."</td></tr>";

                                echo "<tr><td>Item quantity:</td><td>".$item_row["quantity"]."</td></tr>";
                                echo "<tr><td>Extra description:</td><td>".$item_row["extra_desc"]."</td></tr>";

                                echo "</table><br>";
                        }
                        else
                        {
                                echo "Error, item not found<br>";
                        }
                        echo "<a href='view-items.php'>Back to item list</a>";
                ?>
        </body>
</html>
