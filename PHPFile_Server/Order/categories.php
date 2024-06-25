<?php

/*   Student Name: Hsin Tang
     File Name: categories.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page use for get the category from backend */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Assignment2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT category_name FROM Category";
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Database query error: " . $conn->error]);
} else {
    header('Content-Type: application/json');

    if ($result->num_rows > 0) {
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row['category_name'];
        }
        echo json_encode($categories);
    } else {
        echo json_encode(["error" => "No categories found"]);
    }
}

$conn->close();
?>
