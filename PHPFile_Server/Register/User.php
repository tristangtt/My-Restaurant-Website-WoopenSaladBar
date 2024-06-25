<!-- Student Name: Hsin Tang
     File Name: User.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: The script declares a class named User.-->

<?php

class User {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }
	
	public function setEmail($email){
		$this->email = $email;
	}

    public function getPassword() {
        return $this->password;
    }
	
	public function setPassword($password){
		$this->password = $password;
	}	
}

?>
