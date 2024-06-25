<!-- Student Name: Hsin Tang
     File Name: feedbackDAO.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: The script declares a class named feedbackDAO.-->

<?php

require_once('abstractDAO.php');

class feedbackDAO extends AbstractDAO {
    
    public function addContact($name, $email, $topic, $message) {
        // Suppose you have a table named Contact in your database table with name, email, topic and message fields
        $query = "INSERT INTO Contact (name, email, topic, message) VALUES (?, ?, ?, ?)";
        
        // Use prepared statements to prevent SQL injection attacks
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("ssss", $name, $email, $topic, $message); 
        $success = $statement->execute();
        
        // Returns the operation result (true or false)
        return $success;
    }
}

?>
