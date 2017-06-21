<?
session_start();

// App class
include "classes/App.class.php";

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
// define database

$database_config = $config['connection'][$config['database']];
$driver = $database_config['driver'];

define('DATABASE', ucfirst($driver).'Database');
define('DATABASE_NAME', $database_config['database']);
define('DATABASE_USER', $database_config['username']);
define('DATABASE_PASS', $database_config['password']);
define('DATABASE_SERVER', $database_config['host']);

$app = new App();
// Include dependencies
include "classes/Company.class.php";

require_once 'routes/admin_routes.php';









