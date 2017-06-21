<?

/**
 * Serve HTML to client
 * @global object $app
 * @param string $view - view-file path
 * @param array $data - Data needed for this view
 */
function loadView($view, $data) {
    global $app;
    
    extract($data);
    
    include 'layout/header.php';
    require_once $view;
    include 'layout/footer.php';
    
    exit; // Always end script after footer
}

/* Function gets differet Stock types */

function getStocksTypes() {
	global $db;
	$stocks = array();
	$sql = "SELECT * FROM stock_types";
	$result = $db->get_results($sql);

    foreach($result as $res) {
        $stocks[$res->id] = $res->name;
    }
	return $stocks;
}

// Highest market Price

function highestPrice() {
    global $db;
    

}

