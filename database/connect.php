<?php
$servername = "localhost";
$database = "web_servidor";
$username = "root";
$password = "M4tr1x123";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully</br>";

// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS users(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `password` VARCHAR(30) NOT NULL,
    `login` VARCHAR(70) NOT NULL UNIQUE,
    `is_active` BOOLEAN,
    `created_at` DATETIME,
    `uptaded_at` DATETIME
)";

if(mysqli_query($conn, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// $sql = "INSERT INTO users (
//         `name`,
//         `passowrd`,
//         `login`,
//         `is_active`,
//         `created_at`,
//         `updated_at`
//         )
//     VALUES (
//         `Administrador`, 
//         `password`, 
//         `admin@utfpr.com.br`, 
//         `1`, 
//         now(), 
//         now()
//     );";
    
// if(mysqli_query($conn, $sql)){
//     echo "Inserted successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }

?>