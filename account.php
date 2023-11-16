<?php
include('./db.php');

// Check the action parameter
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch($action){
        case 'register':
            if (
                isset($_GET['username']) &&
                isset($_GET['password']) &&
                isset($_GET['fullname']) &&
                isset($_GET['address']) &&
                isset($_GET['phone']) &&
                isset($_GET['email'])
            ) {
                $username = $_GET['username'];
                $password = $_GET['password'];
                $fullname = $_GET['fullname'];
                $address = $_GET['address'];
                $phone = $_GET['phone'];
                $email = $_GET['email'];

                if (isset($_GET['autologin']))
                    $autologin = $_GET['autologin'] === 'true';
                else
                    $autologin = false;

                $sql_check = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql_check);

                if ($result->num_rows == 1) {
                    echo json_encode(['status' => 'error', 'message' => 'Username already exists', 'username' => $username]);
                } else {
                    $favorites = "[]";
                    $cart = "[]";

                    if (
                        $conn->query("CREATE TABLE IF NOT EXISTS {$username}_history (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    uuid VARCHAR(20),
                    buy_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    address VARCHAR(100),
                    items MEDIUMBLOB,
                    total float,
                    received_date DATETIME)") === TRUE && $conn->query(
                            "INSERT INTO users (username, password, fullname, address, phone, email, favorites, cart) 
             VALUES ('$username', '$password', '$fullname', '$address', '$phone', '$email', '$favorites', '$cart')"
                        ) === TRUE
                    ) {

                        if ($autologin)
                            $_SESSION['username'] = $username;
                        echo json_encode(['status' => 'success', 'message' => 'Registration successful', 'username' => $username]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error, 'username' => $username]);
                    }
                }
            } else 
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            break;

        case 'login':
            if (isset($_GET['username']) && isset($_GET['password'])) {
                $username = $_GET['username'];
                $password = $_GET['password'];

                $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $_SESSION['username'] = $username;
                    echo json_encode(['status' => 'success', 'message' => 'Login successful', 'username' => $username]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Invalid username or password', 'username' => $username]);
                }
            }
            else 
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            break;
        case 'getdata':
            if (isset($_GET['username'])) {
                $username = $_GET['username'];

                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    echo json_encode(['status' => 'success', 'message' => 'Data retrieved successfully', 'data' => $row]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error retrieving data', 'username' => $username]);
                }
            }
            else 
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            break;
        case 'update':
            if (
                isset($_GET['username']) &&
                isset($_GET['password']) &&
                isset($_GET['fullname']) &&
                isset($_GET['address']) &&
                isset($_GET['phone']) &&
                isset($_GET['email'])
            ) {
                $username = $_GET['username'];
                $password = $_GET['password'];
                $fullname = $_GET['fullname'];
                $address = $_GET['address'];
                $phone = $_GET['phone'];
                $email = $_GET['email'];

                $sql = "UPDATE users 
                        SET password='$password', fullname='$fullname', address='$address', phone='$phone', email='$email' WHERE username='$username' AND password='$password'";

                $result = $conn->query($sql);

                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Data updated successfully', 'username' => $username]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error updating data', 'username' => $username]);
                }
            }
            else 
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            break;

        case 'logout':
            unset($_SESSION['username']);
            echo json_encode(['status' => 'success', 'message' => 'Logout successful', 'username' => $username]);
            break;
        case 'delete':
            if (isset($_GET['username'])) {
                $username = $_GET['username'];
                unset($_SESSION['username']);

                $sql = "DELETE FROM users WHERE username='$username'";
                $result = $conn->query($sql);

                $sql = "DROP TABLE {$username}_history";
                $result = $conn->query($sql);


                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Account deleted successfully', 'username' => $username]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error deleting account', 'username' => $username]);
                }
            }
            else 
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            break;
    }
}

$conn->close();

?>