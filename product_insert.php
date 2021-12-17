<?php
             session_start();
        $mysqli = new mysqli("localhost", "root", "", "categories");

        if(isset($_POST['submit']))
        {    
              $name = $_POST['name'];
            $p_name = $_POST['p_name'];
                $sp = $_POST['sp'];
                $cp = $_POST['cp'];
            $avlqty = $_POST['avlqty'];

            $query = "INSERT INTO producttable(cat_id, product_name, sp, cp, avlstock ) 
                       VALUES('$name','$p_name','$sp','$cp','$avlqty')";
                        
             $_SESSION['success']='success';
             $_SESSION['message'] = 'Record Has Been Saved Successfully!';
              
            header('Location: products.php');
            $result = $mysqli->query($query);
            
            die($mysqli->error);
            
        } 

        if(isset($_POST['submit_1']))
        {
            $id = $_POST['id'];
            $query = "DELETE FROM producttable where product_id = $id ";
            
            $result = $mysqli->query($query);
            $_SESSION['danger']='danger';
             $_SESSION["message"] = "Record Has Been Deleted Successfully!";
              
            header('Location: products.php');
        }

        if(isset($_POST['submit_2']))
        {
            $id = $_POST['id'];
            $cat_id = $_POST['cat_id'];
            $p_name = $_POST['p_name']; 
            $sp = $_POST['sp'];
            $cp = $_POST['cp'];
            $avlstock = $_POST['avlqty'];

            
            $query = "UPDATE producttable SET cat_id = '$cat_id', product_name = '$p_name', sp = '$sp', cp = '$cp', avlstock = '$avlstock'
            WHERE producttable.product_id = $id";

            $result = $mysqli->query($query);
            $_SESSION['info']='info';
            $_SESSION["message"] = "Record Has Been Updated Successfully!";
             
            header('Location: products.php');
            die($mysqli->error);
           
        }



?>