<!DOCTYPE html>
<html lang="en">
<?php
  require_once  "header/nav.php";

?>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ordered</title>


   <style>
      body {
         background-image: url("images/background_template.jpg");
      }

       #de{

         margin-top: 70px;
         border-collapse: collapse;
         background-color:whitesmoke;
      }

     #de tr {
         text-align: center;
         border: 5px;
      }

      #de th {

         border: 2px solid yellow;
         padding: 20px;
         color:black;

      }

      #de td {
         border: 2px solid yellow;
         padding: 20px;
      }
   </style>
</head>

<body>

   <h2 style="text-align:center;margin-top:70px;color:#FFFFFF;text-transform:uppercase"><i>Ordered Details</i></h2>
</body>

</html>





<?php

// session_start();
$con = mysqli_connect("localhost:3306", "root", "", "web_project1");
$sql = "select * from ordered_details";
$res = mysqli_query($con, $sql);


echo "<center>
<table id='de'>
<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th> 
    <th>item</th>
    <th>Size</th>
    <th>Quantity</th>
    <th>price</th>
    <th>Date and time</th>
    

</tr>";



while ($row = $res->fetch_assoc()) {
   $usr = $row['user_id'];
   $Ad = $row['Address'];
   $pr = $row['Product_name'];
   $siz=$row['Size'];
   $quan=$row['quantity'];
   $pric = $row['price'];
   $time = $row['time'];


   $sql = "select stu_name,stu_phone from newuser where id=$usr";
   $result = mysqli_query($con, $sql);


   if ($row = $result->fetch_assoc()) {

      echo
      "
        <tr>
        <td>{$row['stu_name']}</td>
        <td>{$row['stu_phone']}</td>
        <td>$Ad</td>
        <td>$pr</td>
        <td>$siz</td>
        <td>$quan</td>
        <td>$pric</td>
        <td>$time</td>
        </tr>";
   }
}
echo "</table></center>";

  require_once "header/footer.php";
?>