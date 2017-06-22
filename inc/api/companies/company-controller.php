<?

if(count($app->url) > 1) {
	$section = $app->url[1];
} else {
	$section= "";
}
  
switch($section) {
	case "new-company":
		$view = 'inc/api/companies/views/new-company.php';
	break;
	case "edit-company":
		$view = 'inc/api/companies/views/edit-company.php';
	break;
	default:
		$view = 'inc/api/companies/views/company-dashboard.php';
	break;
}


CompaniesView($view);

function CompaniesView($view) {
    global $app;
 
    if(isset($app->post)) {
        if(isset($app->get['id'])) {

    		// Edit company
			$company = new Company($app->get['id']);
			$success = $company->update($app->post);
			
			$company = new Company($app->get['id']);

    	} else {

        	// New company
			$company = new Company();
			$success = $company->add($app->post);
        }

        $data['company'] = $company;
        $data['success'] = $success;

    } else {

    	if(isset($app->get['id'])) {
    		// Edit company
			$company = new Company($app->get['id']);
			 $data['company'] = $company;

    	} else {
	    	$companies = Company::getCompanies();
	    	$data['companies'] = $companies;

	    }
    }

   

    loadView($view,$data);

}






