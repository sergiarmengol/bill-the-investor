
<?
/**********************************************************************
*  @Author: Sergi Armengol
*  
*  Desc..: Set configuration for a connection
*	Connection to a database
*	Disconnect from database
*	Quote data before putting in database. It is used to make sensitive data secure before putting in database. We will 
*	use it for email addresses. For other data, we will use other method.
*	execute a prepare statement for insertion and deletion in database.
*	Select a single row from database and return it
*	Select a set of rows from database and return them.
*
*/

/**********************************************************************
*  
*/
class MysqlDatabase {

	// defining secrete variables
    private $db_name= DATABASE_NAME;
    private $db_user= DATABASE_USER;
    private $db_pass= DATABASE_PASS;
    private $db_server= DATABASE_SERVER;
    // protected PDO connection
    protected $conn;

    /**
    * Contructor
    */
    function MysqlDatabase() {
		self::connect();

    }

    /**
	 * Setting database configuration
	 */
	function set_config($server,$db,$user,$pass)
	{
	    $this->db_server=$server;
	    $this->db_name=$db;
	    $this->db_user=$user;
	    $this->db_pass=$pass;
	}
    /**
	 * connecting with a mysql database
	 */
	private function connect() {

	    $this->conn = new mysqli($this->db_server, $this->db_user, $this->db_pass);
		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $this->conn->connect_error);
		}
	}
	/**
	 * Disconnecting database connection
	 */
	private function disconnect(){
	    $this->conn = $this->conn->close();;
	}

}