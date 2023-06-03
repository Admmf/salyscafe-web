<?php
    include_once "../include/dbconn.php";

    if(isset($_POST['menu_id'], $_POST['m_name'], $_POST['m_desc'], $_POST['m_price'])) {
        $menu_id = $_POST['menu_id'];
        $m_name = $_POST['m_name'];
        $m_desc = $_POST['m_desc'];
        $m_price = $_POST['m_price'];

        if(isset($_FILES['newImage'])) {
            $location = "./uploads/";
            $img = $_FILES['newImage']['name'];
            $tmp = $_FILES['newImage']['tmp_name'];
            $dir = '../uploads/';
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
            $image = rand(1000, 1000000) . "." . $ext;
            $final_image = $location . $image;
            if (in_array($ext, $valid_extensions)) {
                $path = UPLOAD_PATH . $image;
                move_uploaded_file($tmp, $dir . $image);
            }
        } else {
            $final_image = $_POST['existingImage'];
        }

        $updateItem = mysqli_query($conn, "UPDATE menu SET 
            menu_name='$m_name', 
            description='$m_desc', 
            price=$m_price,
            image='$final_image' 
            WHERE menu_id=$menu_id");

        if ($updateItem) {
            echo "true";
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo "Invalid request. Required parameters are missing.";
    }
?>
