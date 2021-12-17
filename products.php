<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
    <?php include "header.php" ?>
  
</head>
<body>
    
<script>
$(document).ready(function() {
    $('#product').DataTable({
        "processing" : true,
        "serverside" : true,
		"ajax" : "productsdata.php" ,
		
        
	}); // datatable closed
    
    $("#submit").click(function(){
          
          $.ajax({
                      type : "POST",
                       url  : "product_insert.php" ,

                    

                 });
 
 }); 
 
    
} );


</script>
    
<?php 
session_start();
if (isset($_SESSION["message"])) : ?>
<?php

if(isset($_SESSION['success'])) {
   echo '<div class="alert alert-success" role="alert">';
   echo $_SESSION["message"];
   //unset($_SESSION["success"]);
   //unset($_SESSION["message"]);
   session_unset();
session_destroy();
   
   echo  '</div>';
}

if(isset($_SESSION['danger'])) {
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION["message"];
   // unset($_SESSION["danger"]);
    //unset($_SESSION["message"]);
    session_unset();
session_destroy();
    
    echo '</div>';
 }
 
 if(isset($_SESSION['info'])) {
   echo ' <div class="alert alert-warning" role="alert">';
    echo $_SESSION["message"];
   // unset($_SESSION["warning"]);
    //unset($_SESSION["message"]);
    
    session_unset();
session_destroy();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    echo '</div>';
 }
 ?>
 <?php endif; ?>



 <br>
<a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#addmodal" >Add New Row</a>
<a href = "#" class = "btn btn-info " data-toggle = "modal" data-target = "#editmodal">Edit</a>
<a href = "#" class = "btn btn-danger " data-toggle = "modal" data-target = "#deletemodal" >Delete</a>
<hr>
<div class = "container">
<form action = "product_insert.php" method = "POST">



    <div class = "modal fade" id = "addmodal">
    <div class = "modal-dialog">
    <div class = "modal-content">
    
    <div CLASS =  "modal-header">
    <h5>Add New Product</h5>
    <a href = "#" class = close data-dismiss = "modal" >&times;</a>
    </div>

    <div class = "modal-body ">
    <form action = "product_insert.php" method = "POST">
    <div class = "container">
    <label><b>Choose Your Product Category : </b></label>
    <select name = "name" required> 
    <option disabled selected>Select Category</option>
    <?php 
    
     $mysqli = new mysqli("localhost", "root", "", "categories");
     $query = "SELECT * FROM category ORDER BY id ASC";
     $result = $mysqli->query($query);
        
     while($data = $result->fetch_array())
     {
        echo "<option value='". $data['id'] ."'>" .$data['id'] ."</option>";  // displaying data in option menu
     }
    
    ?>
    </select>

    <label><b>Enter New Product Name :</b></label>
    <input type = "text" name = "p_name" required><br>
    <label><b>Enter Selling Price :</b></label>
    <input type = "text" name = "sp" required ><br>
    <label><b>Enter Cost Price :</b></label>
    <input type = "text" name = "cp" required><br>
    <label><b>Enter Available Quantity :</b></label>
    <input type = "text" name = "avlqty" required><br>
    </div>
    </form>
    </div>
     
     <div class = "modal-footer">
     <button class = "btn btn-success" type = "submit"   name ="submit" id ="submit" onclick>Submit</button>
     <button class = "btn btn-warning" class = "close" data-dismiss = "modal" >Cancel</button>
     </div>   
     
    
    
    </div>
    </div> 
    </div>
    

    <!-- Delete Modal -->
    <form action ="product_insert.php" method = "POST">
    <div class = "modal fade" id = "deletemodal">
    <div class = "modal-dialog">
    <div class = "modal-content">

    <div class = "modal-header">
    <h5>Delete Product</h5>
    <a href = "#" class = close data-dismiss = "modal">&times;</a>
    </div>

    <div class = "modal-body">
    <form action ="product_insert.php" method = "POST">
    <label><b>Enter Existing Product ID :</b></label>
    <input type ="text" name = "id" required>
    </form>
    </div>
     
     <div class = "modal-footer">
     <button class = "btn btn-success"  type ="submit" name = "submit_1" id ="submit" onclick>Submit</button>
     <button class = "btn btn-warning" class = "close" data-dismiss="modal">Cancel</button>
     </div>
    
    
    </div>
    </div>
    </div>
    </form>
       <!--- Edit Modal-->
       <form action ="product_insert.php" method = "POST">
     <div class = "modal fade" id = "editmodal">
     <div class = "modal-dialog">
     <div class = "modal-content">
     
     <div class = "modal-header">
     <h5>Update Product : Name,SP,CP,Available Quantity</h5>
    <a href = "#" class = close data-dismiss = "modal">&times;</a>
     </div>
     
     <div class = "modal-body ">
    <form action = "product_insert.php" method = "POST">
    <div class = "container">
    <label><b>Enter Existing Product ID :</b></label>
    <input type ="text" name = "id"required>
    <label><b>Choose Your Product Category : </b></label>
    <select name = "cat_id" required> 
    <option disabled selected required>Select Category</option>
    <?php 
    
     $mysqli = new mysqli("localhost", "root", "", "categories");
     $query = "SELECT * FROM category ORDER BY id ASC";
     $result = $mysqli->query($query);
        
     while($data = $result->fetch_array())
     {
        echo "<option value='". $data['id'] ."'>" .$data['id'] ."</option>";  // displaying data in option menu
     }
    
    ?>
    </select>

    <label><b>Enter New Product Name :</b></label>
    <input type = "text" name = "p_name"required><br>
    <label><b>Enter New Selling Price :</b></label>
    <input type = "text" name = "sp" required><br>
    <label><b>Enter New Cost Price :</b></label>
    <input type = "text" name = "cp" required><br>
    <label><b>Enter New Available Quantity :</b></label>
    <input type = "text" name = "avlqty" required><br>
    
    </div>
    </form>
    </div>
    
     <div class = "modal-footer">
     <button class = "btn btn-success" type = "submit"   name ="submit_2" id ="submit" onclick>Submit</button>
     <button class = "btn btn-warning" class = "close" data-dismiss = "modal" >Cancel</button>
     </div>   

     




     </div>
     </div>
     </div>
     </form>
     
    <table id="product" class="table table-striped"   style="width:100%">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Category</th>
                <th>Product</th>
                <th>Selling Price</th>
                <th>Cost Price</th>
                <th>Available Qty.</th>
               
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Product Id</th>
                <th>Category</th>
                <th>Product</th>
                <th>Selling Price</th>
                <th>Cost Price</th>
                <th>Available Qty.</th>
               
            </tr>
        </tfoot>
    </table>
    </form>
    </div>

</body>
</html>