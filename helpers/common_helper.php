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

function getStatisticsStocks($params = array()) {
        global $db;
        array_merge(array(
            "order_by"=>null

            ),$params);

        $sql = "SELECT DISTINCT com.name 'company_name', ex.name 'exchange_name', st.*, st_t.name 'stock_type_name' FROM companies AS com";
        $sql .=" INNER JOIN stocks AS st ON st.company_id = com.id";
        $sql .= " INNER JOIN exchange AS ex ON ex.id = st.exchange_id";
        $sql .= " INNER JOIN stock_types AS st_t ON st_t.id = st.stock_type_id";

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

