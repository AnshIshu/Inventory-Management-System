<?php  
        $mysqli = new mysqli("localhost", "root", "", "categories");
       
        session_start();
        if(isset($_POST['submit']))
        {
            
             $title = $_POST['title'];
             $query = "INSERT INTO category(title) 
             VALUES('$title')";
             
             $_SESSION['success']='success';
            $_SESSION['message'] = 'Record Has Been Saved Successfully!';
             //$_SESSION['msg_type'] = 'Success';
             header('Location: categories.php');
             $result =$mysqli->query($query);
                die($mysqli->error);
         }  


         if(isset($_POST['submit_1']))
         {
                $id = $_POST['id'];
                $query = "DELETE FROM CATEGORY WHERE ID = $id";
                echo($mysqli->error);
                $_SESSION['danger']='danger';
             $_SESSION["message"] = "Record Has Been Deleted Successfully!";
              //$_SESSION["msg_type"] = "danger";
              header('Location: categories.php');
              $result =$mysqli->query($query);
                 die($mysqli->error);
          }  
 

          if(isset($_POST['submit_2']))
         {
                $id = $_POST['id'];
                $title = $_POST['newtitle'];
                
                $query = "UPDATE category SET TITLE = '$title'
                 WHERE category.id = $id";
                
                $_SESSION['info']='info';
             $_SESSION["message"] = "Record Has Been Updated Successfully!";
              //$_SESSION["msg_type"] = "warning";
             header('Location: categories.php');
              $result =$mysqli->query($query);
              if(! $result ) {
                die('Could not update data: ' . $mysqli->error);
             }
                 die($mysqli->error);
          } 
?>
        
         
        
