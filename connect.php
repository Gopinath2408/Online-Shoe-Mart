<?php

$stu_name=$_POST['name'];
$stu_date=$_POST['birth'];
$stu_phone=$_POST['mobile'];
$stu_email=$_POST['mail'];
$stu_pass=$_POST['newpass'];

$con=mysqli_connect("localhost:3306","root","","web_project1");
$sql="insert into newuser(stu_name,stu_date,stu_phone,stu_email,stu_pass) values('$stu_name','$stu_date','$stu_phone','$stu_email','$stu_pass')";
$result=mysqli_query($con,$sql);

if($result)
{
    echo "Yes"; 
}
else
{
 echo "no";
}

header("Location:ordered_sucess.php");
