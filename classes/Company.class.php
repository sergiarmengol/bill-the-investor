<?

class Company {
    
    public $name;                // String


    function Company($id=null) {
        if($id) {
            $sql = "SELECT * FROM companies WHERE id = ".$id;
        } 

    }

    public function add($post) {
        global $app;

        $values_company = $keys_company  = "";

        foreach($post as $name => $value) {
            $keys_company .= $name.",";
            $values_company .= $value.',';
        }
        $keys_company = trim(',',$keys_company);
        $values_company = trim(',',$values_company);

        $sql = "INSERT INTO companies (".$keys_company.")";
        $sql .= " VALUES (".$values_company.")";
        
        $res = $app->db->query($sql);
        echo "<pre>";
        print_r($res);
        echo "</pre>";
        if($res){
            return true;
        } else {
            return false;
        }

    }
}