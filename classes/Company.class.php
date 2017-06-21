<?
/*******************************************************************************
 * 
 *                            
 *                               Company class
 *  
 ******************************************************************************/
class Company {
    
    public $id;                 //Int
    public $name;               // String
    public $state;              //Int
    public $address;            //String
    public $description;        //String

    const TABLE = "companies";

    public function __construct($id = null) {
        global $db;

        if($id) {
            $sql = "SELECT * FROM companies WHERE id = ".$id;
            $res = $db->get_row($sql);
            
            foreach($res as $name => $value) {
                $this->$name = $value;
            }

        } 

    }

    public function add($data) {
        global $db;

        if(!$data) return false;
        
        $name = $data['name'];
        $state = $data['state'];
        $address = $data['address'];
        $description = $data['description'];

        
        $sql = "INSERT INTO ".self::TABLE." (name,state,address,description) 
                VALUES (
                '".$name."',
                '".$name."',
                '".$address."',
                '".$description."'
                )";

        $res = $db->query($sql);
        return $res ? true : false;

    }

    public function update($data) {
        global $db;
        
        if(!$data) return false;
        
        $name = $data['name'];
        $state = $data['state'];
        $address = $data['address'];
        $description = $data['description'];

        
        $sql = "UPDATE ".self::TABLE." SET 
                    name = '".$name."', 
                    address = '".$address."', 
                    description = '".$description."', 
                    state = '".$state."'  
                WHERE id = '".$this->id."'";
        
        $res = $db->query($sql);
        
        if($res) {
            return true;
        } else {
            return false;
        }

    }

    public static function getCompanies($get = array()) {
        global $db;

        $sql = "SELECT * FROM companies";
        $res = $db->get_results($sql);
        if (!empty($res)) {
            return $res;
        } else {
            return array();
        }
    }
    public static function getStatisticsStocks($get = array()) {
        global $db;

        $sql = "SELECT DISTINCT com.*, ex.name 'exchange_name', st.price, st_t.name 'stock_type_name' FROM companies AS com";
        $sql .=" INNER JOIN stocks AS st ON st.company_id = com.id";
        $sql .= " INNER JOIN exchange AS ex ON ex.id = st.exchange_id";
        $sql .= " INNER JOIN stock_types AS st_t ON st_t.id = st.stock_type_id";



        $res = $db->get_results($sql);


        if (!empty($res)) {
            return $res;
        } else {
            return array();
        }
    }

   
}