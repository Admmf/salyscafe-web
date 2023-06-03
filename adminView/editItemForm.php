<div class="container p-5">

<h4>Edit Menu Detail</h4>
<?php
    include "../include/dbconn.php";
    if (isset($_POST['record'])){
      $ID = $_POST['record'];
      $qry=mysqli_query($conn, "SELECT * FROM menu WHERE menu_id='$ID'");
      $row1 = mysqli_fetch_assoc($qry);
      $numberOfRow=mysqli_num_rows($qry);
    if($numberOfRow>0){
    ?>
    <form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
      <div class="form-group">
          <input type="text" class="form-control" id="menu_id" value="<?=$row1['menu_id']?>" hidden>
        </div>
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" id="m_name" value="<?=$row1['menu_name']?>">
        </div>
        <div class="form-group">
          <label for="desc">Product Description:</label>
          <input type="text" class="form-control" id="m_desc" value="<?=$row1['description']?>">
        </div>
        <div class="form-group">
          <label for="price">Unit Price:</label>
          <input type="number" class="form-control" id="m_price" value="<?=$row1['price']?>">
        </div>
          <div class="form-group">
             <img width='200px' height='150px' src='<?=$row1["image"]?>'>
             <div>
                <label for="file">Choose Image:</label>
                <input type="text" id="existingImage" class="form-control" value="<?=$row1['image']?>" hidden>
                <input type="file" id="newImage" value="">
             </div>
        </div>
        <div class="form-group">
          <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
        </div>
        <?php
            
        ?>
      </form>
    <?php
    }else{
        echo "error";}
    }else{echo"error";}
?>

	
</div>
