<!-- Student Name: Hsin Tang
     File Name: abstractDAO.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: The script declares a class named AbstractDAO -->

<?php

class AbstractDAO {
    protected $mysqli;
    
    /* Host address for the database */
    protected static $DB_HOST = "127.0.0.1";
    /* Database username */
    protected static $DB_USERNAME = "root";
    /* Database password */
    protected static $DB_PASSWORD = "";
    /* Name of database */
    protected static $DB_DATABASE = "Assignment2";
    
    /*
     * Constructor. Instantiates a new MySQLi object.
     * Throws an exception if there is an issue connecting
     * to the database.
     */
    function __construct() {
        try{
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE,3306);
        }catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
    public function getMysqli(){
        return $this->mysqli;
    }
    
}

?>
