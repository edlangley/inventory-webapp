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
                        include("site-title.php");
                        include("admin-auth.php");
                        // database is now selected and connected - index is $conn
                ?>
                <h1>
                        <?php echo $site_title; ?>
                </h1>
                <hr>
                <form name="categoryform"
                      action="add-cat.php"
                      method="get"
                      onsubmit="return checkForm()"
                      id="categoryform">
                        <table>
                                <tr>
                                        <td>
                                                Category name:
                                        </td>
                                        <td>
                                                <input type="text"
                                                    name="cat_name">
                                        </td>
                                </tr>
                                <tr>
                                        <td></td>
                                        <td>
                                                <input type="submit"
                                                    value="Add">
                                        </td>
                                </tr>
                        </table>
                </form>
        </body>
</html>
