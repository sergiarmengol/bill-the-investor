<?




DashboardView();

function DashboardView() {
    global $app;
 
    $data = array();

    // Statistics stocks for the dashboard
    $statistics_stocks = getStatisticsStocks(
    	array(
    		'order_by' => ['price','DESC']
    		)
    	);

	// Order By company and his stock type
	foreach($statistics_stocks as $company) {
		$companies_grouped[$company->company_name][$company->stock_type_name][] = $company;
	}

	$data['companies_grouped'] = $companies_grouped;


	// Stocks order by price
	$data['companies_high_price'] = $statistics_stocks;


	loadView('inc/api/dashboard/views/dashboard-view.php', $data);
}


   



