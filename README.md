# PL_Drive(stable version)

this site is for sharing pdf documents among my friends.

more features are coming in the final release.

## Requirments to run the site

* PHP version 5.6.3 or more
* Apache version 2.4.25 or more

### Creating Database 

goto your phpMyAdmin and create a database

### Deploying tables

* after creating databse goto `import` option and import the sql file named `shoptors_xt.sql` from the downloaded file. 

### Configuring Database

* Goto your specified directory/config/config.php, and add username, password and database name

```
<?php 
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root'); //username associated with database
	define('DB_PASS', ''); // password 
	define('DB_NAME', 'shoptors_xt'); // database name
?>

```
### Login and Register

* Now you can login with email `admin@admin.com` and password `admin`.


## Version Releases

* [Version 1.1](https://github.com/Xatta-Trone/pl_drive/releases/tag/v1.1.1) - Download count bug fixed
* [Version 1.1.0](https://github.com/Xatta-Trone/pl_drive/releases/tag/v1.1.0) - 1st release (PHP version | Responsive)
* [Version 1.1](https://github.com/Xatta-Trone/pl_drive/releases/tag/v1.0) - HTML markup (non responsive)


## Contact

For any query contact me [Here](https://www.facebook.com/monzurul.islam1112) or send a mail at `monzurul.ce.buet@gmail.com`


