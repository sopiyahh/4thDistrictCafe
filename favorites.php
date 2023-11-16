<?php
include('./db.php');


// Check the action parameter
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Assuming you have an 'users' table with a 'favorites' column
    $sql = "SELECT favorites FROM users WHERE username='$loguser'";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        echo json_encode(['status' => 'error', 'exists' => false, 'message' => 'Error checking if item is in favorites']);
        return;
    }
    $favorites = json_decode($result->fetch_assoc()['favorites']);

    switch ($action) {
        case 'toggle':
            if (isset($_GET['itemId'])) {
                $itemId = $_GET['itemId'];

                // count the size of array favorites
                $count = count($favorites);
                if (in_array($itemId, $favorites) && $count > 0) {
                    // remove item from favorites
                    unset($favorites[array_search($itemId, $favorites)]);
                    $favorites = array_values($favorites);
                    $json_encode = json_encode($favorites);

                    $sql = "UPDATE users 
                            SET favorites='$json_encode' WHERE username='$loguser'";

                    $result = $conn->query($sql);
                    $count = count($favorites);

                    echo json_encode(['status' => 'success', 'exists' => true, 'message' => 'Item in favorites', 'items' => $favorites, 'count' => $count]);
                } else {
                    // add item to favorites
                    array_push($favorites, $itemId);
                    $json_encode = json_encode($favorites);

                    $sql = "UPDATE users 
                            SET favorites='$json_encode' WHERE username='$loguser'";
                    $result = $conn->query($sql);
                    $count = count($favorites);

                    echo json_encode(['status' => 'failed', 'exists' => false, 'message' => 'Item not in favorites', 'items' => $favorites, 'count' => $count]);
                }
            }

            break;
        case 'remove':
            // remove item from favorites
            unset($favorites[$key]);
            $favorites = array_values($favorites);
            $json_encode = json_encode($favorites);

            $sql = "UPDATE users 
            SET favorites='$json_encode' WHERE username='$loguser'";

            $result = $conn->query($sql);
            $count = count($favorites);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => "$itemId removed from favorites successfully", 'items' => $favorites, 'count' => $count]);
            } else {
                echo json_encode(['status' => 'error', 'message' => "Error removing $itemId from favorites", 'items' => $favorites, 'count' => $count]);
            }
            break;
    }

}

$conn->close();

?>