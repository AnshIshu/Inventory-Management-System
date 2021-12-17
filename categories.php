
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIES</title>
    
    <?php include "header.php";?>
    
    
</head>
<body>  


    <!-- CODE IN JAVASCRIPT TO DRAW THE DATA TABLES -->
<script>
$(document).ready(function() {
    $('#cat').DataTable({
        "processing" : true,
        "serverside" : true,
        
		"ajax": {
           url : "categoriesdata.php",
		   type : "POST",
        }
        
	}); // datatable closed

      
      $("#submit").click(function(){
          
           $.ajax({
                       type : "POST",
                        url  : "category_insert.php" ,

                     

                  });
  
  }); // click function closed
  }); // ready function closed


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
<a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#newrowmodal">Add New Row</a>   
<a href = "#" class = "btn btn-info" data-toggle = "modal" data-target = "#editmodal">Edit</a>
<a href = "#" class = "btn btn-danger" data-toggle  = "modal" data-target = "#deletemodal">Delete</a>
<hr>
   
<div class = "container">
<form action = "category_insert.php" method = "POST">

        <!-- ADD NEW ROW POP-UP FORM OR MODAL -->
   <div class = " modal fade " id = "newrowmodal"> 
   <div class = "modal-dialog" >
   <div class = "modal-content">

   <div class = "modal-header">
   <h5>Add Category </h5>
   <a href = "#" class = close data-dismiss = "modal">&times;</a>
   </div>
  
   <div class = "modal-body">
   <form action = "category_insert.php"  id = "myform" method = "POST">
   <label><b>Enter Title :</b></label>
    <input type = "text" name = "title"  required>
    <br><br>
    </form>
   </div>
   
   <div class = "modal-footer">
   <button type = "submit"  class = "btn btn-success" name = "submit" id = "submit" onclick>Submit</button>  
   <a href = "#" class = "btn btn-warning" data-dismiss = "modal">Cancel</a>   
   </div>
   </div>
   </div>
   </div>
   

  
        <!-- DELETE ROW MODAL -->
   <form action = "category_insert.php" method = "POST">
   <div class = " modal fade " id = "deletemodal"> 
   <div class = "modal-dialog" >
   <div class = "modal-content">

   <div class = "modal-header">
   <h5>Delete Category </h5>
   <a href = "#" class = close data-dismiss = "modal">&times;</a>
   </div>
  
   <div class = "modal-body">
   <form action = "category_insert.php"  id = "form" method = "POST">
   <label><b>Enter Existing ID :</b></label>
    <input type = "text" name = "id"  required>
    <br><br>
    </form>
   </div>
   
   <div class = "modal-footer">
   <button type = "submit"  class = "btn btn-success" name = "submit_1" id = "submit" onclick>Submit</button>  
   <button href = "#" class = "btn btn-warning" data-dismiss = "modal">Cancel</button>   
   </div>
   </div>
   </div>
   </div>
   </form>
   


      <!-- UPDATE ROW MODAL -->
      <form action = "category_insert.php" method = "POST">
   <div class = " modal fade " id = "editmodal"> 
   <div class = "modal-dialog" >
   <div class = "modal-content">

   <div class = "modal-header">
   <h5>Update Category </h5>
   <a href = "#" class = close data-dismiss = "modal">&times;</a>
   </div>
  
   <div class = "modal-body">
   <form action = "category_insert.php"  id = "updateform" method = "POST">
   <label><b>Enter Existing ID :</b></label>
    <input type = "text" name = "id"   required><br>
    <label><b>Enter New Title :</b></label>
    <input type = "text" name = "newtitle" required>
    <br><br>
    </form>
   </div>
   
   <div class = "modal-footer">
   <button type = "submit"  class = "btn btn-success" name = "submit_2" id = "submit" onclick>Submit</button>  
   <button href = "#" class = "btn btn-default" data-dismiss = "modal">Cancel</button>   
   </div>
   </div>
   </div>
   </div>
   </form>
    <table id="cat" class=" table table-bordered table table-striped" id = "dynamic_field" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                 </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Title</th>
                
            </tr>
        </tfoot>
     </table>

   




    </form>
    </div>
</body>
</html>
