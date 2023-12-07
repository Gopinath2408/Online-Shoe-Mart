<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php

$con=mysqli_connect("localhost:3306","root","","web_project1");
 

if(isset($_REQUEST["name"]))
  {
     
     $name=$_REQUEST['name'];
     $count=$_REQUEST['nam'];
     $sql="update cart set quantity=$count where img_id=$name";
     $result=mysqli_query($con,$sql);
     
     
  }
   
//    $name=$_REQUEST['name'];
// //    $count=$_REQUEST['count'];
//     // $sql="update cart set quantity='2' where img_id=$name";
//     $sql="delete img_id from cart where img_id=$name";
//     $result=mysqli_query($con,$sql);


echo "Hello";

?>



</body>
</html>