<?
/*******************************************************************************
 * 
 *                            
 *                               App class
 *  
 ******************************************************************************/

class App {
    
    public $url;                // Array
    public $route;              // String
    public $session;            // Array
    public $db;                 // Object
    
    public $post;               // Array - POST data
    public $get;                // Array - GET data
    
    
    /**
     * 
     * Process request URL
     * Set current session
     * Set global config
     */
    public function __construct() {
        include 'inc/database/_database.php';
        $this->parseUrl();
        $this->session = $_SESSION;
        $this->db = $db;
    }
    
    /**
     * Parse request URL as array
     * Set POST & GET globals
     * @return array - URL segments
     */
    public function parseUrl() {
        if(isset($_GET['url'])) {
            $this->url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            $this->route = str_replace("admin/", "", $_GET['url']);
        } else {
            $this->url[0] = "/";
        }
        
        if($_POST) {
            $this->post = array_map("cleanInputText", $_POST);
        }
        
        if($_GET) {
            $this->get = array_map("cleanInputText", $_GET);
        }
    }

}

