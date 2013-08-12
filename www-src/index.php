<?php
        include("site-title.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
        <head>
                <meta name="generator"
                      content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org">
                <title>
                        <?php echo $site_title; ?>
                </title>
        </head>
        <frameset cols="15%, 85%"
                  border="0">
                <frame src="sidebar.php"
                       scrolling="no">
                <frame src="view-items.php"
                       name="main">
        </frameset>
</html>
