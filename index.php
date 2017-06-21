<?
//error_reporting(E_ALL);
// Close displaying error messages
if (ini_get('display_errors')) {
  //ini_set('display_errors', '0');
}

$base =  "/xampp/htdocs";

ini_set('include_path', get_include_path() . PATH_SEPARATOR . $base);

// Init controller
require_once 'inc/init.php';



?>