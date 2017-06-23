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
    
    include 'inc/layout/header.php';
    require_once $view;
    include 'inc/layout/footer.php';
    
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

// Get all the data to build the dashboard based on the stocks
function getStatisticsStocks($params = array()) {
    global $db;
    array_merge(array(
        "order_by"=>null

        ),$params);

    $sql = "SELECT DISTINCT com.name 'company_name',com.id 'company_id', st.exchange_id, ex.name 'exchange_name', st.*, st_t.name 'stock_type_name' FROM companies AS com";
    $sql .=" INNER JOIN stocks AS st ON st.company_id = com.id";
    $sql .= " INNER JOIN exchange AS ex ON ex.id = st.exchange_id";
    $sql .= " INNER JOIN stock_types AS st_t ON st_t.id = st.stock_type_id";
    $sql .= " WHERE com.state = 1 AND ex.state = 1";
    if(isset($params['order_by'])) {
          if(is_array($params['order_by'])) {
            $sql .= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
        }
    }

    $res = $db->get_results($sql);


    if (!empty($res)) {
        return $res;
    } else {
        return array();
    }
}

function cleanInputText($str) {
    $str = html_entity_decode($str);
    $str = strip_tags($str);
    $str = addslashes($str);

    return $str;
}

