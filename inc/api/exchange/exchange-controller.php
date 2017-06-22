<?

if(count($app->url) > 1) {
	$section = $app->url[1];
} else {
	$section= "";
}

switch($section) {
	case "new-exchange":
		$view = 'inc/api/exchange/views/new-exchange.php';
	break;
	case "edit-exchange":
		$view = 'inc/api/exchange/views/edit-exchange.php';
	break;
	default:
		$view = 'inc/api/exchange/views/exchange-dashboard.php';
	break;
}


ExchangeView($view);

function ExchangeView($view) {
    global $app;
 
    if(isset($app->post)) {
        if(isset($app->get['id'])) {

    		// Edit exchange
			$exchange = new Exchange($app->get['id']);
			$success = $exchange->update($app->post);
			
			$exchange = new Exchange($app->get['id']);
		   	$data['exchange_stocks'] = $exchange->getExchangeStocks();
			$data['stock_types'] = getStocksTypes();

    	} else {

        	// new exchange
			$company = new Exchange();
			$success = $exchange->add($app->post);
        }

        $data['exchange'] = $exchange;
        $data['success'] = $success;

    } else {

    	if(isset($app->get['id'])) {
    		// Edit exchange
			$exchange = new Exchange($app->get['id']);
			$data['exchange'] = $exchange;
		   	$data['exchange_stocks'] = $exchange->getExchangeStocks();
			$data['stock_types'] = getStocksTypes();
			

    	} else {
	    	$exchange_markets = Exchange::getExchange();
	    	$data['exchange_markets'] = $exchange_markets;

	    }
    }



    loadView($view,$data);

}






