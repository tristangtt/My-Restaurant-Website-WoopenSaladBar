<?php

/*   Student Name: Hsin Tang 
     File Name: menu.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page use for get the menu items from backend */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Assignment2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT MenuItem.*, Category.category_name FROM MenuItem JOIN Category ON MenuItem.category_id = Category.category_id";
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Database query error: " . $conn->error]);
} else {
    header('Content-Type: application/json');
    
    if ($result->num_rows > 0) {
        $menuItems = [];
        while($row = $result->fetch_assoc()) {
            $menuItems[] = $row;
        }
        echo json_encode($menuItems);
    } else {
        echo json_encode(["error" => "No menu items found"]);
    }
}

$conn->close();
?>
