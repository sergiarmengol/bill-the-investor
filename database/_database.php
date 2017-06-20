<?
// Initialise database object and establish a connection
// at the same time - db_user / db_password / db_name / db_host

// define database

$database_config = $config['connection'][$config['database']];
$driver = $database_config['driver'];

define('DATABASE', ucfirst($driver).'Database');
define('DATABASE_NAME', $database_config['database']);
define('DATABASE_USER', $database_config['username']);
define('DATABASE_PASS', $database_config['password']);
define('DATABASE_SERVER', $database_config['host']);

include "mysql_database.php";

$db = new MysqlDatabase();



