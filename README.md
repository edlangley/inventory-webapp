inventory-webapp
================

A really simple PHP+MySQL web application to inventorise items in
categories with a description.

Overview
--------
This code started life as an assignment for a little web technologies
module I did at uni to produce an administration back end for a
classified adverts website. 

Several years after originally writing this code, I decided I needed
something to keep a record of what electronics components I had stored
around, so I dug out this project and re-purposed it as a general
purpose inventory. You may find it useful for a similar purpose.

Installation
------------
You will need a web server which can use PHP (Such as Apache) as well
as PHP itself and MySQL installed and configured correctly. This code
is tested with Apache 2.2.22, PHP 5.3.10, and MySQL 5.5.31.

Depending upon your system, copy the PHP and HTML files in www-src/ 
to a location served up by your web server, and the MySQL database
directory electronics in sql-db-sample/ to the MySQL databases
directory on your system.

As an example, the locations could be:

PHP code: /var/www/inventory/
SQL files: /var/lib/mysql/electronics/

Currently, the header admin-auth.php which connects to the MySQL
database requires that a MySQL user 'mysqluser' with password
'mysqlpass' exists, to add such a user:

	$ mysql -u root -p <currentpasswd>
	mysql> CREATE USER 'mysqluser'@'localhost';
	mysql> SET PASSWORD FOR 'mysqluser'@'localhost' = PASSWORD('mysqlpass');
	mysql> GRANT ALL ON electronics.* TO 'mysqluser'@'localhost';
	mysql> exit

Alternatively, edit the file admin-auth.php with an appropriate
username and password to suit your MySQL installation.

You can changes the database name too, if you want to inventorise
something else. Just change the directory name which is copied to
the mysql data directory, and refer to the different name in the above
commands.
Remember to also change the name passed to the mysql_select_db call in
admin-auth.php.

Check the database is loaded properly and accessible:

	$ mysql -u mysqluser -p
	mysql> USE electronics
	mysql> SHOW tables;
	mysql> SELECT * FROM item;

That last command will also tell you the default user name and
password to log in to the site :-)

Lastly, add or remove admin users as desired:

	mysql> INSERT INTO admin_users (user_name,password) VALUES ('newadminuser','newpassword');
	mysql> DELETE FROM admin_users WHERE user_name='bob';


Usage
-----
Browse to index.php, enter a username and password from the admin_users
table. After successful login you will see a table with adverts in it.
From there, use of the site is all fairly self explanatory.



