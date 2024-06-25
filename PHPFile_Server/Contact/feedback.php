<!-- Student Name: Hsin Tang
     File Name: feedback.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: The script declares a class named feedback.-->

<?php

class feedback {
    private $name;
    private $email;
    private $topic;
    private $message;

    public function __construct($name, $email, $topic, $message) {
        $this->name = $name;
        $this->email = $email;
        $this->topic = $topic;
        $this->message = $message;
    }

    

    public function getName() {
        return $this->name;
    }
	
	public function setName($name){
		$this->name = $name;
	}
    
    public function getEmail() {
        return $this->email;
    }
	
	public function setEmail($email){
		$this->email = $email;
	}

    public function getTopic() {
        return $this->topic;
    }
	
	public function setTopic($topic){
		$this->topic = $topic;
	}

    public function getMessage() {
        return $this->message;
    }
	
	public function setMessage($message){
		$this->message = $message;
	}
}

?>
