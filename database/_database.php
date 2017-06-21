<?
global $db;
// Initialise database object and establish a connection
// at the same time - db_user / db_password / db_name / db_host

// is the database already up?
if(!isset($db)) {

	$account_db_usr = DATABASE_USER;
	$account_db_pwd = DATABASE_PASS;
	$account_db_name = DATABASE_NAME;
	$account_db_server = DATABASE_SERVER;


	// Include ezSQL core
	include_once "database/ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "database/ez_sql_mysql.php";

	// Initialise database object and establish a connection
	// at the same time - db_user / db_password / db_name / db_host
	$db = new ezSQL_mysql($account_db_usr, $account_db_pwd, $account_db_name, $account_db_server, '');


}




