<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icons/official-store.png"> 
    <title>Profile</title>
    <?php
  require_once  "header/nav.php";

?>
    <style>


body {
     font-family: 'nunito', sans-serif;
     background-color: #f0f0f0;
     background-image: url("images/background_template.jpg");
 }

form {
      background: rgba(130, 110, 190, 0.952);
      margin-top: 100px;
      width: 490px;
      height: 450px;
      border-radius: 1rem;
      box-shadow: 0rem 0rem 3.57rem 0rem #796F79;
      padding: 40px;
      border: 2px solid yellow;

    }

    label,
    input {
      padding: 10px;
    }

    #but {

      border-radius: 15px;
      border: 1px solid #09e783;
      padding: 14px;
      margin-left: 20px;
      background-color: white;
      font-size: 15px;
      margin-top: 40px;

    }
    #but:hover {
      background-color: forestgreen;
      color: white;
    }

    .box{
        width: 50%;
        border: 1px solid yellowgreen;
        border-radius: 40px;
       background-color:aliceblue;
       margin-top: 41px;
    }

    </style>
</head>
<body>
<?php
      // session_start();
      $s = $_SESSION['user'];
      $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
      $sql = "select id from newuser where stu_name='$s'";
      $result = mysqli_query($con, $sql);

      if($row=$result->fetch_assoc())
      {
        $total_ordered = "select Product_name from ordered_details where user_id='{$row['id']}'";
        $result = mysqli_query($con, $total_ordered);
        $total=mysqli_num_rows($result);
      
      }


      $sql = "select * from newuser where stu_name='$s'";
      $result = mysqli_query($con, $sql);
      

      if ($row = $result->fetch_assoc()) {
        echo "<center><form method='post' name='userdetails' id='form' enctype='multipart/form-data'>
            <br><label>Name</label>
            <input type='text' name='user' value='{$row['stu_name']}'>
            <label >DoB</label>
            <input type='date' name='da' value='{$row['stu_date']}'><br><br>
            <label>Mobile</label>
            <input type='number' name='num' value='{$row['stu_phone']}'>
            <label>Email</label>
            <input type='text' name='mail' value='{$row['stu_email']}'><br><br>
            <div class='box'>
               <h3>Total Product Ordered</h3>
               <h2>$total</h2>         
            </div>

            <button type='submit'  name='submit' id='but'>Update</button>   
            </form></center>";

           

      }


      if(isset($_POST['submit'])){
        
        $stu_name=$_POST['user'];
        $stu_date=$_POST['da'];
        $stu_phone=$_POST['num'];
        $stu_email=$_POST['mail'];

        $con=mysqli_connect("localhost:3306","root","","web_project1");
        // $sql="insert into newuser(stu_name,stu_date,stu_phone,stu_email) values('$stu_name','$stu_date','$stu_phone','$stu_email')";
        $sql="update newuser set stu_name='$stu_name',stu_date='$stu_date',stu_phone='$stu_phone',stu_email='$stu_email' where stu_name='$s'";
        $result=mysqli_query($con,$sql);
        header("Location:profile.php");
        
      }

  require_once "header/footer.php";


?>

</body>
</html>