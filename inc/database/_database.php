<?
global $db;
// Initialise database object and establish a connection
// at the same time - db_user / db_password / db_name / db_host

// is the database already up?
if(!isset($app->db)) {

	// Include ezSQL core
	include_once "inc/database/ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "inc/database/ez_sql_mysql.php";

	// Initialise database object and establish a connection
	// at the same time - db_user / db_password / db_name / db_host
	$db = new ezSQL_mysql(DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_SERVER, '');
	
	// If the database doesnt exists: create it, select it and create all the tables
	if(empty($db->get_results("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '".DATABASE_NAME."'")))
	{
		include("inc/database/setup/_database_setup.php");
	}

}




