<?php

$servername = "localhost";
$username = "root"; // default username for localhost is root
$password = ""; // default password for localhost is empty or you can also use root as default password
/*
    TO DO: CHANGE THE PASSWORD FOR ROOT

    * OPEN XAMPP CONTROL PANEL
    * CLICK on Shell button
    * Type this command to change the password for root:
      `mysqladmin -u root -p password ""`
    * Enter your old password
    * Done!
    
*/
$dbname = "4thdistrictcafe_db";

session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $loguser = $_SESSION['username'];
    //header('Location: index.php');
    //exit();


    // Connect to the new database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // callback function of all the favorites of the user
        if (isset($_GET['showdata']) && $_GET['showdata'] === 'true'){
            $sql = "SELECT favorites FROM users WHERE username='$loguser'";
            $result = $conn->query($sql);
            $favorites = json_decode($result->fetch_assoc()['favorites']);
            
            $conn->close();
            echo json_encode(['username' =>  $loguser, 'favorites' => $favorites]);
        }
    }
}
else
{
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        //echo json_encode (['status' => 'success', 'message' => 'Database created successfully']);
    } else {
        echo json_encode (['status' => 'error', 'message' => 'Error creating database: ' . $conn->error]);
        return;
    }


    // Close the connection to the default database
    $conn->close();

    // Connect to the new database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo json_encode (['status' => 'success', 'message' => 'Connected successfully']);


    $sql = "CREATE TABLE IF NOT EXISTS users (
        username VARCHAR(30) PRIMARY KEY,
        password VARCHAR(30) NOT NULL,
        fullname VARCHAR(50) NOT NULL,
        address VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
        favorites MEDIUMBLOB,
        cart MEDIUMBLOB
    )";

    if ($conn->query($sql) === TRUE) {
        //echo json_encode (['status' => 'success', 'message' => 'Table users created successfully']);
    } else {
        echo json_encode (['status' => 'error', 'message' => 'Error creating table: ' . $conn->error]);
        return;
    }

}

?>