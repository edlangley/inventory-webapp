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
                        $catquery = "INSERT INTO category (cat_name) VALUES ('".$_GET["cat_name"]."');";
                        if(mysql_query($catquery, $conn))
                        {
                                echo "Category successfully added";
                                echo "<br><br>";
                                include("view-items-category-form.php");
                        }
                        else
                        {
                                echo "Error, category not added";
                                echo "<br><a href='new-cat.php'>Go back</a>";
                        }
                ?>
        </body>
</html>
