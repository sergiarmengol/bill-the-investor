<?

switch ($app->url[1]) {
    case 'newExchange' : 
       	$exchange = new Exchange();
        $success = $exchange->add($_POST);

        if($success == true) {
            echo json_encode(array("response"=>success,"data"=>$_POST));
        }
    break;
    case 'getChartData':
	     // Statistics stocks for the dashboard
	    $statistics_stocks  = getStatisticsStocks(
	    	array(
	    		'order_by' => ['price','DESC']
	    		)
	    	);

	    // Group companies by the sum of all theirs prices
	    $group_company_by = array();
	    foreach($statistics_stocks as $stocks) {
	    	$group_company_by[$stocks->company_name][$stocks->stock_type_name] += $stocks->price;
	    }

	    // Group exchange markets by the sum of all the companies at it
	    $group_market_by = array();

	    foreach($statistics_stocks as $stocks) {
	    	$group_market_by[$stocks->exchange_name] += 1;
	    }

	    // Total markets with stocks
	    $total_exchange = count($group_market_by);

	    // Convert data to be useful for the google chart display bar plot
        $company_by_price = array(["Company Name","Preferred Stock ( € )","Common Stock ( € )"]);


	    foreach($group_company_by as $company => $stock_company) {
	    		// Getting per each stock type the total price per company
	    		array_push($company_by_price,[$company,$stock_company['Preferred Stock'],$stock_company['Common Stock']]);
	    }
		// Convert data to be useful for the google chart display pie plot
        $company_by_market = array(["Exchange Market Name","%"]);

		// Getting for each exchange the % of companies who are at it
		foreach($group_market_by as $exchange_name => $total) {
			array_push($company_by_market,[$exchange_name,$total]);
		}

	    echo json_encode(array("company_by_price" => $company_by_price, "company_by_market" => $company_by_market));
    break;

    
}