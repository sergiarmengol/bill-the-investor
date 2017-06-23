<?
/*******************************************************************************
 * 
 *                            
 *                               Exchange Market class
 *  
 ******************************************************************************/
class Exchange {

	public $id;	// Int
	public $name;	//String
	public $state;	//Int


	const TABLE = "exchange";

	public function __construct($id = null, $exchange=array()) {
		global $db;
        if ($id && !$exchange) {
            $sql = "SELECT * FROM ".self::TABLE." WHERE id = ".$id;
            $exchange = $db->get_row($sql);
        }
        
        if($exchange) {
            $this->id = $exchange->id;
            $this->name = $exchange->name;
            $this->state = $exchange->state;

        }
	}

	public function add($data) {
        global $db;

        if(!$data) return false;
        
        $name = cleanInputText($data['name']);
        $state = $data['state'];

        
        $sql = "INSERT INTO ".self::TABLE." (name,state) 
                VALUES (
                '".$name."',
                '".$state."'
                )";
        $res = $db->query($sql);
        return $res ? true : false;

    }

    public function update($data) {
        global $db;
        
        if(!$data) return false;
        
        $name = cleanInputText($data['name']);
        $state = $data['state'];

        
        $sql = "UPDATE ".self::TABLE." SET 
                    name = '".$name."', 
                    state = '".$state."'  
                WHERE id = '".$this->id."'";
        $res = $db->query($sql);
        
        if($res) {
            return true;
        } else {
            return false;
        }

    }
	 public static function getExchange($options = array()) {
        global $db;
        $markets = [];
        
        $options = array_merge(array(
            "id"             => null,
            "name"         => null,
            "state"		=> null,
            "order_by"		=> null
    
        ), (array) $options);
        
        $filters = [];
        $sql = "SELECT * FROM ".self::TABLE;
        
        // Filters: user_id
        if($options['state']) {
            $filters[] = "state = ".$options['state'];
        }

        // Filters: name
        if($options['name']) {
            $filters[] = "name LIKE '%".$options['name']."%'";
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
                $exchange[] = new self($result->id, $result);
            }
        }
        
        return $exchange;
    }

    public function getExchangeStocks() {
        global $db;

        $sql = "SELECT DISTINCT com.name 'company_name', st.price, st.stock_type_id, st.date_created FROM companies AS com";
        $sql .=" INNER JOIN stocks AS st ON st.company_id = com.id";
        $sql .= " WHERE exchange_id = ".$this->id;

        $res = $db->get_results($sql);

        return $res ? $res : array();
    }

       // Delete Exchange Market from BBDD
    public function delete() {
        global $db;
        if($this->id) {
            $sql = "DELETE FROM ".self::TABLE." WHERE id =".$this->id;
            $res = $db->query($sql);

            return !empty($res) ? true : false;
        }
    }

}