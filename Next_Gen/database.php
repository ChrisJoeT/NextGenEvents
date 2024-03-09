<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Next_Gen";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the created database
$conn->select_db($dbname);

$sql_create_booking_order = "CREATE TABLE IF NOT EXISTS booking (
    si_number INT AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(255),
    cu_name VARCHAR(255),
    email VARCHAR(255),
    phone_number VARCHAR(10),
    place VARCHAR(255),
    booking_status VARCHAR(255)
)";

// Execute create table query for booking
if ($conn->query($sql_create_booking_order) === TRUE) {
    echo "Table booking created successfully<br>";
} else {
    echo "Error creating booking table: " . $conn->error . "<br>";
}


$createTableQuery = "CREATE TABLE IF NOT EXISTS user (
    sino INT AUTO_INCREMENT PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL
)";

// Execute the query
if (mysqli_query($conn, $createTableQuery)) {
    echo "Table 'user' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


$sql= "SHOW TABLES LIKE 'opinions'";
$result = $conn->query($sql);

if ($result->num_rows == 0){
$sql = "
    CREATE TABLE opinions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        opinion TEXT NOT NULL,
        submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Table 'opinions' created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

}   else{
    echo "Table 'opinions' already exists";
}






// Close the connection
$conn->close();
?>

