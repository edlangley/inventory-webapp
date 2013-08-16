inventory-webapp
================

A really simple PHP+MySQL web application to inventorise items in
categories with a description.

Overview
--------
This code started life as an assignment to produce an administration
back end for a classified adverts website, during a web technologies
module I did at university. 

Several years after originally writing this code, I decided I needed
something to keep a record of what electronics components I had stored
around, so I dug out this project and re-purposed it as a general
purpose inventory. You may find it useful for a similar purpose.

Installation
------------
You will need a web server which can use PHP (Such as Apache) as well
as PHP itself and MySQL installed and configured correctly. This code
is tested with Apache 2.2.22, PHP 5.3.10, and MySQL 5.5.31.

Depending upon your system, copy the PHP files in php/ to a
location served up by your web server.

As an example, the location could be: /var/www/inventory/

Currently, the header admin-auth.php which connects to the MySQL
database requires that a MySQL user 'mysqluser' with password
'mysqlpass' exists, to add such a user:

	$ mysql -u root -p <currentpasswd>
	mysql> CREATE USER 'mysqluser'@'localhost';
	mysql> SET PASSWORD FOR 'mysqluser'@'localhost' = PASSWORD('mysqlpass');

Alternatively, edit the file admin-auth.php with an appropriate
username and password to suit your MySQL installation.

admin-auth.php connects to a database called "electronics". You can
change the database name, if you want to inventorise
something else. Just change the name passed to the `mysql_select_db`
call in admin-auth.php, and use that database name instead in the
following commands.

Create a MySQL database called electronics on the system:

	# mysql -u root
	mysql> CREATE DATABASE electronics;
	mysql> GRANT ALL ON electronics.* TO 'mysqluser'@'localhost';
	mysql> exit
	
Then import the MySQL dump in sql-db-sample/ to that MySQL database.

	# mysql -u root electronics < /path/to/electronics.sql

Check the database is loaded properly and accessible:

	$ mysql -u mysqluser -p
	mysql> USE electronics
	mysql> SHOW tables;
	mysql> SELECT * FROM item;

That last command will also tell you the default user name and
password to log in to the site :-)

Add or remove admin users as desired:

	mysql> INSERT INTO admin_users (user_name,password) VALUES ('newadminuser','newpassword');
	mysql> DELETE FROM admin_users WHERE user_name='bob';

These MySQL operations could be done in say, PHPMyAdmin. If so,
create the database first and make sure it is selected on the left
hand sidebar, then import the .sql file.

Lastly, the title of the site displayed on most pages can be changed
by editing site_title.php.

Usage
-----
Browse to index.php, enter a username and password from the admin_users
table. After successful login you will see a table with the items in it.
From there, use of the site is all fairly self explanatory.



