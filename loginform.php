<?php session_start();
//echo 'session email:'.$_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>LOGIN FORM</title>
    
</head>
<body>
<?php if(isset($_SESSION['email'])) : ?>

<?php else : ?>
<form class = " container  display-5 position-absolute top-50 start-50 translate-middle "  method="post" style="border:2px solid black" action = "checkuser.php" >
<div class ="form-group  mx-auto text-center form p-4  " >
<label class ="control-label col-sm-5" for ="email" >Email :</label>
<div class ="col-sm-5  mx-auto text-center form p-4 " >
<input type ="email " class = "form-control" name="email" id = " email " placeholder = "Enter E-mail">
<?php //require "validrequired.php";?>
</div>
</div> 
<div class ="form-group  mx-auto text-center form p-4 " >
<label class ="control-label col-xd-2  " for ="password"  >Password :</label>
<div class = "col-sm-5  mx-auto text-center form p-4 ">
<input type = "password" class = " form-control"  name="password" id ="password"  placeholder = "Enter Password">
</div>
</div>
<div class ="form-group mx-auto text-center form p-1" >
<div class = "col-sm-md-offset-2 col-sm-10 mx-auto text-center form p-1 ">
<button input type =" submit" name = "submit"   class ="btn btn-success">Sign In</button>  

</div>
</div>
</form>
<?php endif; ?>

</body>
</html>