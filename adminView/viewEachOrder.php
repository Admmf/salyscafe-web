<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu Image</th>
            <th>Menu Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
        </tr>
    </thead>
    <?php
        include_once "../include/dbconn.php";
        if (isset($_GET['orderID'])) {
            $ID = $_GET['orderID'];
            $sql= "SELECT * from order_ where order_id=$ID";
            $result=$conn-> query($sql);
            $count=1;
            if ($result-> num_rows > 0){
                ?>
                    <tr>
                        <td><?=$count?></td>
                        <?php
                        $subqry="SELECT * from menu m, order_ v
                        where m.menu_id=v.menu_id ";
                        $res=$conn-> query($subqry);
                        if($row2 = $res-> fetch_assoc()){
                        ?>

                        <td><img height="80px" src="<?=$row2["image"]?>"></td>
                        <td><?=$row2["menu_name"] ?></td>
                        <td><?=$row["quantity"]?></td>
                        <td><?=$row["price"]?></td>
                    </tr>
        <?php
                    $count=$count+1;
                }
            
            }else{
                echo "error";
            }
        }
        ?>
</table>
</div>
