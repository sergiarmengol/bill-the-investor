<?

/*******************************************************************************
 * 
 *                            
 *                              Stock class
 *  
 ******************************************************************************/

class Stock {

	public $id;				// Int
	public $company_id;		// Int
	public $company_name;	// String
	public $exchange_id;	// Int
	public $exchange_name;	// String
	public $stock_type_id;	// Int
    public $stock_type_name;  // Name
	public $price;			// Float
    public $time;
    public $date;

	const TABLE = "stocks";

	
	public function __construct($id = null, $stock=array()) {
		global $db;
        if ($id && !$stock) {
            $sql = "SELECT st.*, com.name 'company_name', ex.name 'exchange_name', st_t.name 'stock_type_name' FROM ".self::TABLE." AS st";
            $sql .= " INNER JOIN companies AS com on com.id = st.company_id";
            $sql .= " INNER JOIN exchange AS ex on ex.id = st.exchange_id";
            $sql .= " INNER JOIN stock_types AS st_t on st_t.id = st.stock_type_id";
            $sql .= " WHERE st.id = ".$id;

            $stock = $db->get_row($sql);

        }
        
        if($stock) {
            $this->id = $stock->id;
            $this->company_id = $stock->company_id;
            $this->company_name = $stock->company_name;
            $this->exchange_id = $stock->exchange_id;
            $this->exchange_name = $stock->exchange_name;
            $this->stock_type_id = $stock->stock_type_id;
            $this->stock_type_name = $stock->stock_type_name;
            $this->price = $stock->price;
            $this->date =  date('d.m.Y',strtotime($stock->date_created));
            $this->time =  date("H:i:s",strtotime($stock->date_created));
        }

 
	}

	public function add($data){
      	global $db;

        if(!$data) return false;
        $id = "";
        $company_id = $data['company_id'];
        $exchange_id = $data['exchange_id'];
        $stock_type_id = $data['stock_type_id'];
        $price = $data['price'];

        $sql_check = "SELECT id FROM ".self::TABLE." WHERE company_id = ".$company_id." AND stock_type_id = ".$stock_type_id. " AND exchange_id = ".$exchange_id;

        $check = $db->get_var($sql_check);

        if(isset($check)) {
    	   $id = $check;
    	   $sql = "UPDATE ".self::TABLE." SET 
                    company_id = '".$company_id."', 
                    exchange_id = '".$exchange_id."', 
                    stock_type_id = '".$stock_type_id."', 
                    price = '".$price."' 
                WHERE id = '".$id."'";


        } else {
        	$sql = "INSERT INTO ".self::TABLE." (company_id,exchange_id,stock_type_id,price) 
                VALUES (
                '".$company_id."',
                '".$exchange_id."',
                '".$stock_type_id."',
                '".$price."'
                )";
        }
        
        
        $res = $db->query($sql);

        if(empty($id)) {
            $id = $db->insert_id;
        }

        if($res) {
            $stock = new self($id);

            return $stock ? $stock : false;
        } 
        
	}


	public function getStocks($options = array()){
		global $db;
        $stocks = [];
        
        $options = array_merge(array(
            "id"             	=> null,
            "company_id"        => null,
            "company_name"		=> null,
            "exchange_id"		=> null,
            "exchange_name"		=> null,
            "stock_type_id"		=> null,
            "order_by"			=> null
    
        ), (array) $options);
        
        $filters = [];
        $sql = "SELECT st.*, com.name 'company_name', ex.name 'exchange_name' FROM ".self::TABLE." AS st";

        $sql .= " INNER JOIN companies AS com on com.id = st.company_id";
        $sql .= " INNER JOIN exchange AS ex on ex.id = st.exchange_id";
        
        // Filters: user_id
        if($options['stock_type_id']) {
            $filters[] = "stock_type_id = ".$options['stock_type_id'];
        }

        // Filters: company name
        if($options['company_name']) {
            $filters[] = "com.name LIKE '%".$options['company_name']."%'";
        }

        // Filters: company name
        if($options['exchange_name']) {
            $filters[] = "ex.name LIKE '%".$options['exchange_name']."%'";
        }
        
        foreach($filters as $key => $filter) {
            $sql .= $key == 0 ? " WHERE ".$filter : " AND ".$filter;
        }
        
        if(is_array($options['order_by'])) {
            $sql .= " ORDER BY ".$options['order_by'][0]." ".$options['order_by'][1];
        }

        $results = $db->get_results($sql);
        if($results) {
            foreach($results as $result) {
                $stocks[] = new self($result->id, $result);
            }
        }

        return $stocks;
	}

    public function delete() {
        global $db;
        if($this->id) {
            $sql = "DELETE FROM ".self::TABLE." WHERE id =".$this->id;
            $res = $db->query($sql);

            return !empty($res) ? true : false;
        }
    }
}