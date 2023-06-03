<?php
    include_once "../include/dbconn.php";
    
    if(isset($_POST['upload']))
    {
       
        $MenuName = $_POST['m_name'];
        $desc= $_POST['m_desc'];
        $price = $_POST['m_price'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO menu
         (menu_name,price,description,image) 
         VALUES ('$MenuName','$price',$desc,'$image')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>