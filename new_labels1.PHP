  <!-- ADD NEW ROW : FUNCTIONING ,MODAL AND DISPLAYING TABLE AFTER ADDING NEW ROW -->

<?php session_start();?>
<?php include "sldropdown.php" ?>
   <?php 
    
//header('Location: new_labels.php');
$mysqli = new mysqli("localhost", "root", "", "stocklabels");
if(isset($_POST['submit_3']))
{      //$previous_page = $_SESSION['current_page'];
  //  echo $_SESSION['label_name'];
   $label_name = $_SESSION['label_name'];    
     $p_name = $_POST['p_name'];
     $qty = $_POST['qty'];
     $datime = $_POST['datime'];
     $query = "INSERT INTO $label_name(product_name,qty,datime) 
     VALUES('$p_name','$qty','$datime')";
     //echo $label_name;
     
     $result =$mysqli->query($query);
        //die($mysqli->error);
        //echo $_SESSION['label_name'];
     //echo $label_name;
        //header("location:$previous_page");  
        //header('location:history.go(-1)');
        //header('Location:'.$_SESSION['label_name']);
       // session_unset();
    //session_destroy();
    echo "<div class = container>";?>
    <a href = "#" class = "btn btn-info" data-toggle = "modal" data-target = "#addmodal" >Add New Row</a>
      <?php
//   <!-- table display ho rhi haai -->
     //echo $_SESSION['label_name'];
     //echo $label_name;
  echo "<h5><hr><br><center>Table : <b><i>".$label_name."</b></i> Is Being Displayed</center><hr><br></h5>";
   echo "<div>";
   $query = "SELECT * FROM $label_name ";
    $result = $mysqli->query($query);   
   
$row = $result ->fetch_assoc();
//printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
echo "<div class = container>";
echo "<table  id = table class = table Table-striped border = 3 style = width:100%>";
 echo "<tr>";
 echo "<th>".join("</th><th>",array_keys($row))."</th><th>Action</th>";
 
 echo "</tr>";

 while ($row)
 {
     echo "<tr>";
     echo "<td>".join("</td><td>",$row)."</td><td><span  type = button class = 'btn btn-success'><a  class = 'ajaxedit' data-id =$row[id]  onclick>Update</a></span><span  type = button class = 'btn btn-danger'><a  class='ajaxdelete' data-id =$row[id] onclick>Delete</a></span></td>";
     echo "</tr>";
     $row = $result ->fetch_assoc();
    // printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
 }

 echo "</table>";
 echo "</div>";
 }  
 //session_unset();
    //session_destroy();
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
    <input type = "quantity" name = "qty" required><br>
    <label><b>Enter Date :</b></label>
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









   <script>
$(document).ready(function(){


$(".ajaxedit").on("click",function(){
  event.stopPropagation();
    event.stopImmediatePropagation();
//alert("helooo");

var el = this;
var editid = $(this).data('id');
//alert(deleteid);
alert("you really want to edit row number :"+editid);



}); //edit click function




$(".ajaxdelete").on("click",function(){
  event.stopPropagation();
    event.stopImmediatePropagation();
//alert("byeee");

var el = this;
var deleteid = $(this).data('id');
//alert(deleteid);
//alert("ROW NUMBER :"+deleteid+" IS SUCCESSFULLY DELETED");
$.ajax({
        url: 'udlabels.php',
        type: 'POST',
        data: { requuest :3 id:deleteid },
       success : function(response){
         if(response==1)
         {
           //remove row from html table
           $(el).closest('tr').css('background','tomato');
           $(el).closest('tr').fadeOut(800,function(){
             $(this).remove();
           });
         }
         else
         {
           alert("INVALID ID");
         }
       }
        
});



});//delete click fnctn

});//ready function

</script>