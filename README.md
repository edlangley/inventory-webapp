inventory-webapp
================

A really simple PHP+MySQL web application to hold items in categories
with a description.

Overview
--------
This code started life as an assignment for a little web technologies
module I did at uni. Since then it has been re-purposed slightly as
an inventory for all my electronics bits. You may find it useful for 
a similar purpose.

Installation
------------
You will need a web server which can use PHP (Such as Apache) as well
as PHP itself and MySQL installed and configured correctly. This code
is tested with Apache 2.2.22, PHP 5.3.10, and MySQL 5.5.31.

Depending upon your system, copy the PHP and HTML files in www-src/ 
to a location served up by your web server, and the MySQL database
directory exchange_and_mart in sql-db-sample/ to the MySQL databases
directory on your system.

As an example, the locations could be:

PHP code: /var/www/inventory/
SQL files: /var/lib/mysql/exchange_and_mart/

Currently, the header admin-auth.php which connects to the MySQL
database requires that a MySQL user 'mysqluser' with password
'mysqlpass' exists, to add such a user:

	$ mysql -u root -p <currentpasswd>
	mysql> CREATE USER 'mysqluser'@'localhost';
	mysql> SET PASSWORD FOR 'mysqluser'@'localhost' = PASSWORD('mysqlpass');
	mysql> GRANT ALL ON exchange_and_mart.* TO 'mysqluser'@'localhost';
	mysql> exit

Alternatively, edit the file admin-auth.php with an appropriate
username and password to suit your MySQL installation.

Check the database is loaded properly and accessible:

	$ mysql -u mysqluser -p
	mysql> USE exchange_and_mart
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



