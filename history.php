<?php
include('./db.php');

// Check the action parameter
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch($action){
        case 'add':
            if (isset($_GET['address'])){
                $address = $_GET['address'];

                $sql = "SELECT cart FROM users WHERE username='$loguser'";
                $result = $conn->query($sql);
                $cartItems = $result->fetch_assoc()['cart'];
                
                $json_decoded = json_decode($cartItems);
                $total = 0;

                
                // get each item's price and quantity and add to total from the dictionary
                foreach ($json_decoded as $key => $value) {
                    $total += $value[0] * $value[1];
                }
                
                $uuid = strtoupper(vsprintf('%s%s%s%s%s%s%s%s', str_split(bin2hex(random_bytes(16)), 4)));
                $sql = "INSERT INTO {$loguser}_history (uuid, address, items, total) VALUES ('$uuid', '$address', '$cartItems', '$total')";
                $result = $conn->query($sql);

                // empty the items from the cart
                $sql = "UPDATE users SET cart='{}' WHERE username='$loguser'";
                $result = $conn->query($sql);
                

                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'History added successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error adding history']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            }
            break;
        case 'receive':
            if (isset($_GET['uuid'])){
                $uuid = $_GET['uuid'];

                $sql = "UPDATE {$loguser}_history SET received_date=CURRENT_TIMESTAMP WHERE uuid='$uuid'";
                $result = $conn->query($sql);

                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'History received successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error receiving history']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
            }
            break;
        case 'get':
            $sql = "SELECT * FROM {$loguser}_history";
            $result = $conn->query($sql);
            $history = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($history, $row);
                }
            }
            echo json_encode(['status' => 'success', 'message' => 'History retrieved successfully', 'history' => $history]);
            break;
    }
}


$conn->close();
?>