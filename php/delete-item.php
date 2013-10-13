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
                        $item_id = $_GET["item_id"];
                        $deleteitemquery = "DELETE FROM item WHERE id = '".$item_id."';";
                        if(mysql_query($deleteitemquery, $conn))
                        {
                                echo "Item successfully deleted.";
                        }
                        else
                        {
                                echo "Error, item was not deleted.";
                        }
                        echo "<br><br>";
                        include("view-items-category-form.php");
                ?>
        </body>
</html>
