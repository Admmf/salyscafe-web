<?php
include_once "../include/dbconn.php";

if (isset($_POST['record'])) {
    $order_id = $_POST['record'];

    $sql = "SELECT payment_status FROM order_ WHERE order_id='$order_id'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        if ($row && isset($row["payment_status"])) {
            $current_status = $row["payment_status"];

            $new_status = ($current_status == 0) ? 1 : 0;

            $update = mysqli_query($conn, "UPDATE order_ SET payment_status='$new_status' WHERE order_id='$order_id'");

            if ($update) {
                echo "success";
            } else {
                echo "Error updating payment status.";
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
