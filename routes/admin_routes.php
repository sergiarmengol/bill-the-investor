
<?
print_r($app->url);
if(count($app->url) > 0) {
    $route = $app->url[0];
} else {
    $route = "dashboard";
}


include "layout/header.php";

switch($route) {
    case 'dashboard':
        require_once 'dashboards/dashboard-controller.php';
        break;
    case 'companies':
        include "dashboards/companies/company-controller.php";
        include "dashboards/companies/company-dashboard.php";
        break;
    case 'new-company':
        include "dashboards/companies/company-controller.php";
        include "dashboards/companies/new-company.php";
        break;
    default:
        require_once 'dashboards/dashboard-controller.php';
        break;
}

include "layout/footer.php";
exit;