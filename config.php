<?php
return [
// set a database connection as default
// assign the name defined in connection variable
'database' => 'mysql', // mysql is connection name, can be anything
// config database connections
'connection' => [
                        // name of this connection, used in above option only
            'mysql' => [
	            'driver'    => 'mysql', //database type
	            'host'      => 'localhost', //database host name, on local server it is 'localhost'
	            'database'  => 'bill_investor', // database name
	            'username'  => 'root',  // database username
	            'password'  => 'root',  // user password
            ],
        ],

'root' => 'http://localhost'
];