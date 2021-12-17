                                <!-- creation and deletion of labels-->

<?php
 $mysqli = new mysqli("localhost","root","",'stocklabels');
 
if($mysqli->connect_error)
{
    die("connection failed :".$mysqli->connect_error);
}

 if(isset($_POST['submit']))
 {
     $label_name = $_POST['label_name'];

     $query = "CREATE TABLE $label_name(id int(5)primary key not null auto_increment ,product_name varchar(20),qty int(10),datime date)";
     
     if ($mysqli->query($query) === TRUE) {
        echo "Table  created successfully";
      } else {
        echo "Error creating table: " . $mysqli->error;
      }
      
      header('Location: stock.php');
 }

 
 if(isset($_POST['submit_1']))
 {      
     $label_name = $_POST['label_name'];
     $query = "Drop table  $label_name";
       $result = $mysqli->query($query);
     
     if ($mysqli->query($query) === TRUE) {
        echo "Table  Deleted successfully";
      } else {
        echo "Error deleting  table: " . $mysqli->error;
      }
      $mysqli->close();
      header('Location: stock.php');
 }


  
?>
