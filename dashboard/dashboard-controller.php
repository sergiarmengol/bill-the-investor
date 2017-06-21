<?




DashboardView();

function DashboardView() {
    global $app;
 
    $data = array();
	foreach(Company::getStatisticsStocks() as $company) {
		$companies_grouped[$company->name][$company->stock_type_name][] = $company;
	}

	$data['companies_grouped'] = $companies_grouped;

	loadView('dashboard/views/dashboard-view.php', $data);
}


   



