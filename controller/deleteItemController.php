<?php
    include_once "../include/dbconn.php";

    if(isset($_POST['record'])) {
        $m_id = $_POST['record'];
        $query = "DELETE FROM menu WHERE menu_id='$m_id'";
        $data = mysqli_query($conn, $query);

        if($data) {
            echo "Menu Item Deleted";
        }
        else {
            echo "Not able to delete";
        }
    }
    else {
        echo "Invalid request. 'record' parameter is missing.";
    }
?>
