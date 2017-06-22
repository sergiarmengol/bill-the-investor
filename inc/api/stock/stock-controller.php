<?

if(count($app->url) > 1) {
	$section = $app->url[1];
} else {
	$section= "";
}

switch($section) {
	default:
		$view = 'inc/api/stock/views/stock-dashboard.php';
	break;
}


StockView($view);

function StockView($view) {
    global $app;

    if(isset($app->post)) {
    	$stock = new Stock();
    	$success = $stock->add($app->post);
    } 

    $companies = Company::getCompanies();
    $exchange_markets = Exchange::getExchange();
    $stock_types = getStocksTypes();
	$stocks = Stock::getStocks();

	$data['stocks'] = $stocks;
	$data['companies'] = $companies;
	$data['exchange_markets'] = $exchange_markets;
	$data['stock_types'] = $stock_types;

    

   

    loadView($view,$data);

}






