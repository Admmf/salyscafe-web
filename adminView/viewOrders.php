<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Order Date</th>
        <th>Total Order</th>
        <th>Receipt Number</th>
        <th>Menu </th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>More Details</th>
     </tr>
    </thead>
     <?php
      include_once "../include/dbconn.php";
      $sql="SELECT * from order_";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["total_order"]?></td>
          <td><?=$row["reciept_id"]?></td>
          <td><?=$row["menu_id"]?></td>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Delivered</button></td>
        
            <?php
            }
                if($row["payment_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePayment('<?=$row['order_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["payment_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePayment('<?=$row['order_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
      $(document).ready(function() {
        $('.openPopup').on('click', function() {
        var dataURL = $(this).attr('data-href');
        $('.order-view-modal').load(dataURL, function() {
          $('#viewModal').modal({ show: true });
          });
        });
      });
 </script>