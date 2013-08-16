<?php
        // login as a user from admin_user list table in the db
        if (!isset($_SERVER['PHP_AUTH_USER']))
        {
                header('WWW-Authenticate: Basic realm="Administrator"');
                header('HTTP/1.0 401 Unauthorized');
                echo  'Username and password are required to view this page';
                exit;
        }
        else
        {
                $conn = mysql_connect($_ENV["OPENSHIFT_MYSQL_DB_HOST"].':'.$_ENV["OPENSHIFT_MYSQL_DB_PORT"],
                                      $_ENV["OPENSHIFT_MYSQL_DB_USERNAME"],
                                      $_ENV["OPENSHIFT_MYSQL_DB_PASSWORD"]);
                mysql_select_db("electronics", $conn) or die(mysql_error());
                $sqlquery = "SELECT * FROM admin_users";
                $result = mysql_query($sqlquery, $conn) or die(mysql_error());
                $access_granted = 0;
                while($user = mysql_fetch_array($result))
                {
                        if ($_SERVER['PHP_AUTH_USER'] == $user['user_name'] &&
                            $_SERVER['PHP_AUTH_PW'] == $user['password'])
                        {
                                $access_granted++;
                        }
                }
                if(!$access_granted)
                {
                        header('WWW-Authenticate: Basic realm="Administrator"');
                        header('HTTP/1.0 401 Unauthorized');
                        echo "Invalid username and/or password";
                        exit;
                }
        }
?>
