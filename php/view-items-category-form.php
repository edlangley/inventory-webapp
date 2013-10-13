<form action="view-items.php" method="get">
        View Items in: <select name="current_view_category">
                <?php
                        //get category list and and if done set the previously selected one
                        $sqlquery = "SELECT cat_id, cat_name FROM category";
                        $result = mysql_query($sqlquery, $conn);

                        if(!isset($_GET["current_view_category"]))
                        {
                                $current_view_cat = 0;
                        }
                        else
                        {
                                $current_view_cat = $_GET["current_view_category"];
                        }

                        if($current_view_cat == 0)
                        {
                                echo "<option value=0 selected>All</option>";
                        }
                        else
                        {
                                echo "<option value=0>All</option>";
                        }

                        while($cat_list = mysql_fetch_array($result))
                        {
                                $name = $cat_list["cat_name"];
                                $value = $cat_list["cat_id"];

                                echo "<option value = $value ";
                                if($current_view_cat == $value)
                                        echo " selected ";
                                echo "> $name </option>\n";
                        }
                ?>
        </select> <input type="submit"
              value="View">
</form>
