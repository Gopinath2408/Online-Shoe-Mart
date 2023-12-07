<?php
  
 $con=mysqli_connect("localhost:3306","root","","web_project1");
 
  if(isset($_REQUEST["name"]))
  {
     
      $name=$_REQUEST['name'];
      echo $name;
      $sql="delete from cart where img_id='$name'";
      $result=mysqli_query($con,$sql);
  }
