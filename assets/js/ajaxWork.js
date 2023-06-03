
function showMenu() {
    $.ajax({
      url: "./adminView/viewAllMenu.php",
      method: "post",
      data: { record: 1 },
      success: function (data) {
        $('.allContent-section').html(data);
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  function showOrders() {
    $.ajax({
      url: "./adminView/viewOrders.php",
      method: "post",
      data: { record: 1 },
      success: function(data) {
        $('.allContent-section').html(data);
      },
      error: function(error) {
        console.log("Error: ", error);
      }
    });
  }

  function ChangePayment(id) {
    $.ajax({
      url: "./controller/updatePaymentStatus.php",
      method: "post",
      data: { record: id },
      success: function (data) {
        alert('Payment Status updated successfully');
        $('form').trigger('reset');
        showOrders();
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  
  function ChangeOrderStatus(id) {
    $.ajax({
      url: "./controller/updateOrderStatus.php",
      method: "post",
      data: { record: id },
      success: function (data) {
        alert('Order Status updated successfully');
        $('form').trigger('reset');
        showOrders();
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  
  //add menu data
  function addItems() {
    var m_name = $('#m_name').val();
    var m_desc = $('#m_desc').val();
    var m_price = $('#m_price').val();
    var upload = $('#upload').val();
    var file = $('#file')[0].files[0];
  
    var fd = new FormData();
    fd.append('m_name', m_name);
    fd.append('m_desc', m_desc);
    fd.append('m_price', m_price);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
      url: "./controller/addItemController.php",
      method: "post",
      data: fd,
      processData: false,
      contentType: false,
      success: function (data) {
        alert('Menu Added successfully.');
        $('form').trigger('reset');
        showMenu();
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  
  //edit menu data
  function itemEditForm(id) {
    $.ajax({
      url: "./adminView/editItemForm.php",
      method: "post",
      data: { record: id },
      success: function (data) {
        $('.allContent-section').html(data);
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  
  //update menu after submit
  function updateItems() {
    var menu_id = $('#menu_id').val();
    var m_name = $('#m_name').val();
    var m_desc = $('#m_desc').val();
    var m_price = $('#m_price').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('menu_id', menu_id);
    fd.append('m_name', m_name);
    fd.append('m_desc', m_desc);
    fd.append('m_price', m_price);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
  
    $.ajax({
      url: './controller/updateItemController.php',
      method: 'post',
      data: fd,
      processData: false,
      contentType: false,
      success: function (data) {
        alert('Data Update Success.');
        $('form').trigger('reset');
        showMenu();
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  
  //delete menu data
  function itemDelete(id) {
    $.ajax({
      url: "./controller/deleteItemController.php",
      method: "post",
      data: { record: id },
      success: function (data) {
        alert('Items Successfully deleted');
        $('form').trigger('reset');
        showMenu();
      },
      error: function (error) {
        console.log("Error: ", error);
      }
    });
  }
  
  