<?php
session_start();

$mysqli = new mysqli("localhost","root","","stocklabels");

$request = 0;
if(isset($_POST['request']))
{
    $request = $_POST['request'];
}


   if($request==1)
   { 
       if(isset($_POST['id']))
       {    $label_name = $_SESSION['label_name'];
             $id = $_POST['id'];
           $query = "SELECT * FROM $label_name WHERE id = $id ";
           $result = $mysqli->query($query);
           
           $response = array();
           $row_count = $result->num_rows;
           
           if($row_count>0)
           {
            $row = $result->fetch_assoc();
            $response = array("name" => $row['product_name'],
                               "qty" => $row['qty'],
                                "date" => $row['datime'],
                            );   
          echo json_encode( array("status" => 1,"data" => $response) );
        
          exit;
        }
        else{
            echo json_encode( array("status" => 0) );
            exit;
         }
    }

   }
    
   if($request==2)
    {
        if(isset($_POST['id']))
          {
            $label_name = $_SESSION['label_name'];
          
          $id = $_POST['id'];
          $name=  $_POST['name'];
          $qty = $_POST['qty'];
          $date = $_POST['date'];

          $query = "UPDATE $label_name SET product_name = '$name', qty = '$qty',
           datime = '$date' where $label_name.id = $id ";
               $result = $mysqli->query($query);
               //echo json_encode(die($mysqli->error));
               echo json_encode( array("status" => 1,"message" => "Record updated.") );
         exit;

     }
        
    }

    if($request==3) //for delete row
    {
        if(isset($_POST['id']))
        {      $label_name = $_SESSION['label_name'];
            $id = $_POST['id'];
            //echo $label_name;
            //echo $id;   
            $query = "DELETE FROM $label_name where id = $id ";
            echo 1;
            $result = $mysqli->query($query);
            die($mysqli->error);
            //echo 1;
            exit;
        }
        
    }

?>