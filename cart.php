<?php
include('./db.php');

// Check the action parameter
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    $sql = "SELECT cart FROM users WHERE username='$loguser'";
    $result = $conn->query($sql);
    $cart = json_decode($result->fetch_assoc()['cart'], true);


    switch ($action) {
        case 'add':
            $productName = $_GET['productName'];
            $price = $_GET['price'];

            //add value as (price, quantity) and key as product name
            // check if key is not in cart
            
            if (!$cart)
                $cart = [$productName => [$price, 1]];
            else{
                if (!array_key_exists($productName, $cart))
                    $cart[$productName] = [$price, 1];
                else
                    $cart[$productName] = [$price, $cart[$productName][1] + 1];
            }
            
            

            $json_encode = json_encode($cart);

            $sql = "UPDATE users 
                    SET cart='$json_encode' WHERE username='$loguser'";

            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => "$productName added to cart successfully", 'items' => $cart]);
            } else {
                echo json_encode(['status' => 'error', 'message' => "Error adding $productName to cart", 'items' => $cart]);
            }

            break;
            
        case 'remove':
            $productName = $_GET['productName'];
            // cart as dictionary
            
            if (!$cart || !array_key_exists($productName, $cart)) {
                echo json_encode(['status' => 'error', 'message' => "$productName not in cart", 'items' => $cart]);
                return;
            } else {
                if ($cart[$productName][1] > 1)
                    $cart[$productName] = [$cart[$productName][0], $cart[$productName][1] - 1];
                else
                    unset($cart[$productName]);
            }
            $json_encode = json_encode($cart);


            $sql = "UPDATE users 
                    SET cart='$json_encode' WHERE username='$loguser'";

            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => "$productName removed from cart successfully", 'items' => $cart]);
            } else {
                echo json_encode(['status' => 'error', 'message' => "Error removing $productName from cart:", 'items' => $cart]);
            }

            break;
        case 'getCart':
            echo json_encode(['status' => 'success', 'message' => "Cart retrieved successfully", 'items' => $cart]);
            break;
        default:
            echo "Invalid action.";
            break;
    }
}

$conn->close();

?>