    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STOCK</title>
    <?php include "sldropdown.php"; ?>

  
</head>
<body>
<script>
 $(document).ready(function(){
     $('#stock').DataTable({
         "ajax": "stockdata.php",
         "order": []

     });
     
 });

 
</script>




<div class = "container"> 
  <table id = "stock" class = "table table-striped"  style = "width:100%">
       <thead>
       <tr>
            <th>Product </th>
            <th>Price/Unit </th> 
            <th>Quantity </th> 
            <th>Discount(Rupees) </th>
            <th>Tax(%) </th>
            <th>Total Price(sp*qty-dis*(tax/100)) </th>
            <th>Supplier </th>
                 
       </tr>
     </thead>

     <tfoot>
      <tr>
      
      <th>Product </th>
            <th>Price/Unit </th> 
            <th>Quantity </th> 
            <th>Discount(Rupees) </th>
            <th>Tax(%) </th>
            <th>Total Price(sp*qty-dis*(tax/100)) </th>
            <th>Supplier </th>
      </tr>
       </tfoot>
     </table>


 </div>  


</body>
</html>