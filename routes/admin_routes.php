
<?
/*******************************************************************************
 * 
 *                             Admin routes
 * 
 ******************************************************************************/
// Getting the route
if(count($app->url) > 0) {
    $route = $app->url[0];
} else {
    $route = "dashboard";
}


switch($route) {
    case 'dashboard':
        require_once 'dashboard/dashboard-controller.php';
        break;
    case 'companies':
        include "companies/company-controller.php";
        break;
        
    case 'exchange-market':
        include "exchange/exchange-controller.php";
        break;

    case 'stocks':
        include "stock/stock-controller.php";
    break;

    case 'ajax':

        include 'ajax/ajax-controller.php';
    break;
    case 'setupdatabase':
        include("database/setup/_database_setup.php");
    break;
    default:
        require_once 'dashboard/dashboard-controller.php';
    break;
}
