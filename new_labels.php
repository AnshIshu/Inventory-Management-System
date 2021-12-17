                      <!---LOAD AVAILABLE LABELS FUNCTIONALITY AND 'ADD NEW ROW' MODAL AND FUNCTIONALITY-->
                      
<?php
  session_start();
include "sldropdown.php";
$mysqli = new mysqli("localhost","root","",'stocklabels');
if(isset($_POST['submit_2']))
{     
    $label_name = $_POST['label_name'];
    $_SESSION['label_name']=$label_name;
    
     echo "<div class = container>";?>
     <a href = "#" class = "btn btn-info" data-toggle = "modal" data-target = "#addmodal" >Add New Row</a>
       
    <!-- table display ho rhi haai -->

     <?php
   echo "<h5><hr><br><center>Table : <b><i>".$label_name."</b></i> Is Being Displayed</center><hr><br></h5>";
    echo "<div>";
    $query = "SELECT * FROM $label_name ";
     $result = $mysqli->query($query);
     $row_count = $result->num_rows;   
       if($row_count <= 0)
       {
       echo "<center><h3><I>TABLE IS EMPTY RIGHT NOW,YOU CAN FILL THE TABLE BY CLICKING ON THE ADD NEW ROW BUTTON DISPLAYING JUST BELOW THE STOCK LABEL BUTTON <I></h3></center>";
       }
       else {
 $row = $result ->fetch_assoc();
 //printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
 echo "<div class = container>";
  echo "<table  id = 'table' class = table Table-striped border = 3 style = width:100%>";
  echo "<tr>";
  echo "<th>".join("</th><th>",array_keys($row))."</th><th>Action</th>";
  echo "</tr>";

  while ($row)
  {
      echo "<tr>";
      //echo "<form  action = 'abc.php' method = 'POST'>";
      //$_SESSION['ID'] = $row['id'];
      echo "<td>".join("</td><td>",$row)."</td><td><button  class = ' ajaxedit btn btn-success ' data-id =$row[id] data-toggle = modal data-target = '#updateModal'  onclick>UPDATE</button><button  class='ajaxdelete btn btn-danger' data-id =$row[id] onclick>Delete</button></span></td>";
      echo "</tr>";
      echo "</form>";
       //echo $_SESSION['ID'];
      //echo "row current id=$row[id]";
      $row = $result ->fetch_assoc();
     // printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
  }

  echo "</table>";
  echo "</div>"; 
}
}
?>


                                <!-- ADD NEW ROW POP-UP FORM OR MODAL -->


   <div class = " modal fade " id = "addmodal"> 
   <form action = "new_labels1.php"  id = "myform" method = "POST">
   <div class = "modal-dialog" >
   <div class = "modal-content">

   <div class = "modal-header">
   <h5></h5>
   <a href = "#" class = close data-dismiss = "modal">&times;</a>
   </div>
  
   <div class = "modal-body">
    <label><b>Enter New Product Name :</b></label>
    <input type = "text" name = "p_name" required><br>
    <label><b>Enter Quantity :</b></label>
    <input type = "text" name = "qty" required><br>
    <label><b>Enter Date/Time(YYYY-MM-DD HH:MM:SS) :</b></label>
    <input type = "date" name = "datime" required><br>
     </div>
   
   <div class = "modal-footer">
   <button type = "submit"  class = "btn btn-success" name = "submit_3" id = "submit" onclick>Submit</button>  
   <a href = "#" class = "btn btn-warning" data-dismiss = "modal">Cancel</a>   
   </div>
   </div>
   </div>
   </form> 
   </div>

                                          <!-- ADD NEW ROW DATABASE LINKING AND FUNCTIONING  -->
   <?php 

//header('Location: new_labels.php');
$mysqli = new mysqli("localhost", "root", "", "stocklabels");
if(isset($_POST['submit_3']))
{      
    $label_name = $_SESSION['label_name'];
     $p_name = $_POST['p_name'];
     $qty = $_POST['qty'];
     $datime = $_POST['datime'];
     $query = "INSERT INTO $label_name(product_name,qty,datime) 
     VALUES('$p_name','$qty','$datime')";
     $result =$mysqli->query($query);
        die($mysqli->error);
        //header("location:$previous_page");  
        //header('location:history.go(-1)');
        //header('Location:'.$_SESSION['label_name']);
       // session_unset();
    //session_destroy();
    
 }  
 ?>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 


 <script>
$(document).ready(function(){


$(".ajaxedit").on("click",function(){
  //alert("byeee");
var id = $(this).data('id');
var el = this;
  $('#txt_userid').val(id);
    
    $.ajax({
  
  
   url: 'UDLABELS2.php',
   type: 'POST',
   data: {request : 1, id : id},
   dataType: 'json',
   success: function(response){
     //alert(response.status);
      if(response.status==1){

        $('#name').val(response.data.name);
        $('#qty').val(response.data.qty);
        $('#date').val(response.data.date);

        
      }else{
        alert("Invalid ID.");
      }
   }
});


// Save user 
$('#btn_save').click(function(){
var id = $('#txt_userid').val();

var name = $('#name').val().trim();
var qty = $('#qty').val().trim();
var date = $('#date').val().trim();

if(name !='' && qty != '' && date != ''){

  // AJAX request
  $.ajax({
    url: 'udlabels2.php',
    type: 'post',
    data: {request: 2, id: id,name: name, qty :qty ,date :date},
    dataType: 'json',
    success: function(response){
      //alert(response);
       if(response.status == 1){
          alert(response.message);

          // Empty and reset the values
          $('#name','#qty ','#date').val('');
          $('#txt_userid').val(0);

          // Reload DataTable
         // userDataTable.ajax.reload();

          // Close modal
          //$('#updateModal').modal('toggle');
          $('#updateModal').modal('toggle').hide();
          $(el).closest('tr').css('background','green');
           location.reload();
          
       }else{
          alert(response.message);
       }
    }
 });

}else{
  alert('Please fill all fields.');
}
});
    







 }); // ajaxedit















$(".ajaxdelete").on("click",function(){
  event.stopPropagation();
    event.stopImmediatePropagation();
//alert("byeee");

var el = this;
var deleteid = $(this).data('id');
//alert(deleteid);
//alert("ROW NUMBER :"+deleteid+" IS SUCCESSFULLY DELETED");
$.ajax({
        url: 'udlabels2.php',
        type: 'POST',
        data: { request:3,id:deleteid },
       success : function(response){
         if(response==1)
         {
           //remove row from html table
           $(el).closest('tr').css('background','tomato');
           $(el).closest('tr').fadeOut(800,function(){
             $(this).remove();
             location.reload();
           });
         } //IF CLOSE
         else
         {
           alert("INVALID ID");
         }  // ELSE CLOSE
       } // SUCESS FUNCTION CLOSE
        
}); // AJAX CLOSE



});//delete click fnctn

});//ready function
</script>



      <!-- UPDATE ROW MODAL -->
      <div id="updateModal" class="modal fade" role="dialog">
       <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Update</h4>
             <button type="button" class="close" data-dismiss="modal">&times;</button> 
           </div> 
           <div class="modal-body">
             <div class="form-group">
               <label for="name" > Product New Name :</label>
               <input type="text" class="form-control" id="name" placeholder="Enter name" required> 
             </div>
             <div class="form-group">
               <label for="quantity" >Quantity</label> 
               <input type="text" class="form-control" id="qty" placeholder="Enter quantity" required> 
             </div> 
             <div class="form-group">
               <label for="date" >Date</label> 
               <input type="date" class="form-control" id="date" placeholder="Enter date"required> 
             </div>

           </div>
           <div class="modal-footer">
             <input type="hidden" id="txt_userid" value="0">
             <button type="button" class="btn btn-success btn-sm" id  ="btn_save" onclick>Save</button>
             <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
           </div>
         </div>

       
