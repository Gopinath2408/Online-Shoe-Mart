<?php
  
 $con=mysqli_connect("localhost:3306","root","","web_project1");

  if(isset($_REQUEST["name"]))
  {
     echo "<h1>Hello</h1>"; 
     $name=$_REQUEST['name'];
      print_r($name);
      $sql="delete from image where img_id=$name";
      $result=mysqli_query($con,$sql);
  }

?>