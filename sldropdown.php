<!--STOCK LEVEL DROPDOWN FILE WHICH IS INCLUDED IN STOCK FILE AND NEW_LABELS FILE-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STOCK LABELS</title>
    <?php include "header.php"?>
</head>
<body>
<br>
<nav  class="navbar navbar-expand-lg  bg-light">
<div class="collapse navbar-collapse container-fluid" >
<ul class="navbar-nav mr-auto" >
    <li class = "nav-item">
<div class="dropdown">
<form action = "" method = "POST">
  <button class="btn btn-dark dropdown-toggle" name = "selectlabel" type="button" id="selectlabel" data-toggle="dropdown" >
    STOCK LABELS
     </button>
  
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a  class="dropdown-item" href="#" data-toggle = "modal" data-target = "#addlabel">Add Label</a>
    <a class="dropdown-item" href="#" data-toggle = "modal" data-target = "#removelabel">Remove Label</a>
    <a class = "dropdown-item" href = "#" data-toggle = "modal" data-target = "#label">Load Available Labels</a>
    
  </div>
  </select>
  </form>
</div>
</li>



</nav>








<hr>

<!--add label -->

<div class = "container">
<form action = "sldropdownphp.php" method = "POST">
<div class = "modal fade " id = "addlabel">
<div class = "modal-dialog">
<div class = "modal-content">

<div class =  "modal-header">
<h5>Add Label Name(Only digits Are Not Allowed )<h5>
<a href = "#" class = "close" data-dismiss = "modal">&times;</a>
</div>

<div class = "modal-body">
<label><b>Enter New Label Name :</b></label>
<input type = "text" name = "label_name" required>
</div>

<div class = "modal-footer">
<button class = "btn btn-success" type ="submit" name = "submit" id = "submit" onclick>Submit</button>
<button class ="btn btn-danger" class = "close" data-dismiss = "modal">Cancel</button>
</div>

</div>
</div>
</div>



</form>
</div>


<!-- remove label -->
<div class = "container">
<form action = "sldropdownphp.php" method = "POST">
<div class = "modal fade " id = "removelabel">
<div class = "modal-dialog">
<div class = "modal-content">

<div class =  "modal-header">
<h5>Remove Label<h5>
<a href = "#" class = "close" data-dismiss = "modal">&times;</a>
</div>

<div class = "modal-body">
<form action = "sldropdownphp.php" method = "POST">
<label><b>Choose Existing Label Name :</b></label>
<select name = "label_name" required>
<?php
$mysqli = new mysqli("localhost","root","",'stocklabels');
$query = "show tables";
$result = $mysqli->query($query); 
while($table = $result->fetch_array()) { // go through each row that was returned in $result
   echo "<option class= dropdown-item  href = # data-toggle =modal data-target = #label ".$table[0]."required>" .$table[0] ."</option>";     // print the table that was returned on that row.
}
?>

</select>
</form>
</div>

<div class = "modal-footer">
<button class = "btn btn-success" type ="submit" name = "submit_1" id = "submit" onclick>Submit</button>
<button class ="btn btn-danger" class = "close" data-dismiss = "modal">Cancel</button>
</div>

</div>
</div>
</div>



</form>
</div>

<!-- labels -->

<div class = "container">
<form action = "new_labels.php" method = "POST">
<div class = "modal fade " id = "label">
<div class = "modal-dialog">
<div class = "modal-content">

<div class =  "modal-header">
<h5>Choose Existing Label :<h5>
<a href = "#" class = "close" data-dismiss = "modal">&times;</a>
</div>

<div class = "modal-body">
<form action = "new_labels.php" method = "POST">
<Select name ="label_name">
<?php
 $mysqli = new mysqli("localhost","root","",'stocklabels');
 $query = "show tables";
 $result = $mysqli->query($query); 
 while($table = $result->fetch_array()) { // go through each row that was returned in $result
    echo "<option class= dropdown-item  href = # data-toggle =modal data-target = #label ".$table[0].">" .$table[0] ."</option>";     // print the table that was returned on that row.
 }
?>
</select>
</form>
</div>

<div class = "modal-footer">
<button class = "btn btn-success" type ="submit" name = "submit_2" id = "submit" onclick>Load Data</button>
<button class ="btn btn-danger" class = "close" data-dismiss = "modal">Cancel</button>
</div>

</div>
</div>
</div>



</form>
</div>

</body>
</html>





