
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
        require_once 'inc/api/dashboard/dashboard-controller.php';
        break;
    case 'companies':
        include "inc/api/companies/company-controller.php";
        break;
        
    case 'exchange-market':
        include "inc/api/exchange/exchange-controller.php";
        break;

    case 'stocks':
        include "inc/api/stock/stock-controller.php";
    break;

    case 'ajax':

        include 'inc/ajax/ajax-controller.php';
    break;
    case 'setupdatabase':
        include("inc/api/database/setup/_database_setup.php");
    break;
    default:
        require_once 'inc/api/dashboard/dashboard-controller.php';
    break;
}
