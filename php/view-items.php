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
                                include("view-items-category-form.php");
                                //find items in selected category to put in table
                                $item_query = "SELECT id, name, quantity, cat_id FROM item";
                                if($current_view_cat != 0)
                                        $item_query.= " WHERE cat_id = $current_view_cat";
                                $item_query.= " ORDER BY cat_id, name;";
                                $item_list = mysql_query($item_query, $conn) or die(mysql_error());
                                $num_rows = mysql_num_rows($item_list);
                                echo "Number of items in this category: $num_rows";
                        ?>
                <hr>
                <table border="1">
                        <tr>
                                <td>
                                        Item Name
                                </td>
                                <td>
                                        Category
                                </td>
                                <td>
                                        Quantity
                                </td>
                                <td colspan='3'>
                                        Action on this item
                                </td>
                        </tr><!--<form name = "items_checked" method ="get"> -->
                        <?php
                                // list out the items in the category in a table
                                while($item_row = mysql_fetch_array($item_list))
                                {
                                        $item_id = $item_row["id"];

                                        echo "<tr>";
                                        $name = $item_row["name"];
                                        echo "<td><a href = 'view-an-item.php?id=$item_id'> $name </a></td>";


                                        // get name out of category table
                                        //$cat_id = $item_row["cat_id"];
                                        $cat_query = "SELECT cat_name FROM category where cat_id = ".$item_row["cat_id"];
                                        $cat_list = mysql_query($cat_query, $conn) or die(mysql_error());
                                        $cat_row = mysql_fetch_array($cat_list);
                                        $cat_name = $cat_row["cat_name"];
                                        echo "<td> $cat_name </td>";

                                        //quantity
                                        $item_quantity = $item_row["quantity"];
                                        echo "<td>$item_quantity</td>";

                                        //change quantity:
                                        echo "<td><form action='change-quantity.php' name = 'changequantity' method ='get'>";
                                        echo "<input type='hidden' size ='0' name='item_id' value='$item_id' />";
                                        echo "<input type='hidden' size ='0' name='current_view_category' value='$current_view_cat' />";
                                        echo "Change quantity: ";
                                        echo "<input type='text' name='quantity' size='5' value='$item_quantity' />";
                                        echo "<input type='submit' value='Change' />";
                                        echo "</form></td>";


                                        //move to:
                                        echo "<td><form action='move-item.php' name = 'move' method ='get'>";
                                        echo "<input type='hidden' size ='0' name='item_id' value='$item_id' />";
                                        echo "<input type='hidden' size ='0' name='current_view_category' value='$current_view_cat' />";
                                        echo "Move to: ";
                                        echo "<select name = 'category'>";
                                        //simply put categories in another select box
                                        $catquery = "SELECT cat_id, cat_name FROM category";
                                        $cat_list = mysql_query($catquery);
                                        while($cat_row = mysql_fetch_array($cat_list))
                                        {
                                                $name = $cat_row["cat_name"];
                                                $value = $cat_row["cat_id"];
                                                echo "<option value = $value > $name </option>\n";
                                        }
                                        echo "</select>";
                                        echo "<input type='submit' value='Move' />";
                                        echo "</form></td>";

                                        //remove item:
                                        echo "<td><form action='delete-item.php' name = 'delete' method ='get'>";
                                        echo "<input type='hidden' size='0' name='item_id' value='$item_id' />";
                                        echo "<input type='hidden' size ='0' name='current_view_category' value='$current_view_cat' />";
                                        echo "<input type='submit' value='Remove' />";
                                        echo "</form></td>";

                                        echo "</tr>";
                                }
                        ?>
                </table><br>
        </body>
</html>
