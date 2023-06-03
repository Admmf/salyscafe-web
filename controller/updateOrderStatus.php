<?php
include_once "../include/dbconn.php";

if (isset($_POST['record'])) {
    $order_id = $_POST['record'];

    $sql = "SELECT order_status FROM order_ WHERE order_id='$order_id'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        if ($row && isset($row["order_status"])) {
            $current_status = $row["order_status"];

            $new_status = ($current_status == 0) ? 1 : 0;

            $update = mysqli_query($conn, "UPDATE order_ SET order_status='$new_status' WHERE order_id='$order_id'");

            if ($update) {
                echo "success";
            } else {
                echo "Error updating order status.";
            }
        } else {
            echo "Invalid order ID.";
        }
    } else {
        echo "Error retrieving order information from the database.";
    }
} else {
    echo "Missing 'record' parameter.";
}
?>
