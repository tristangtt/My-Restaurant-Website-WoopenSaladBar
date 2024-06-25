<!-- Student Name: Hsin Tang
     File Name: UserDAO.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: The script declares a class named UserDAO.-->


<?php

require_once('abstractDAO.php');

class UserDAO extends AbstractDAO {
    
    public function addUser($email, $password) {
        // Suppose you have a table named users in your database table with email and password fields
        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        
        // Use prepared statements to prevent SQL injection attacks
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("ss", $email, $password); // 'ss' means both parameters are strings
        $success = $statement->execute();
        
        // Returns the operation result (true or false)
        return $success;
    }
    
}

?>
