<?
session_start();


// Autoload classes
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

// Define configurations
$config = require_once('config.php');
// Define database configurations
require_once 'database/database_config.php';
// Common functions to help
require_once 'helpers/common_helper.php';

// Set session if it's the first time
if(isset($_SESSION['user'])!== true)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 32; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $_SESSION['user'] = hash('sha512',time().''.$randomString);
}
define('user', $_SESSION['user']);


// Start the App module
$app = new App();

/**************************** ROUTES ********************************/

require_once 'routes/admin_routes.php';









