<!DOCTYPE html>
<html lang="en">
<?php
  require_once  "header/nav.php";
 
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Sign In/Sign Up</title>

 
  <style>
    /* #l1
        {
          padding-top: 70px;
        } */

    label {
      padding: 20px;
      /* width: 100px; */
      display: inline-block;
    }

    input {
      padding: 5px;
    }

    #form {
      background: rgba(130, 112, 250, 0.952);
      margin-top: 190px;
      width: 390px;
      height: 350px;
      border-radius: 1rem;
      box-shadow: 0rem 0rem 3.57rem 1rem #796F79;
      padding: 30px;
      border-radius: 20px;
      border: 2px solid yellow;

    }

    #but {

      border-radius: 15px;
      border: 1px solid #09e783;
      padding: 15px;
      margin-left: 3px;
      background-color: white;
      font-size: 14px;

    }

    #but:hover {
      background-color: forestgreen;
      color: white;
    }

    #head {
      
      color: darkblue;
      margin-top: 10px;
    }



    body {
      background-image: url("images/background_template.jpg");
     
    }

    #create{
        
           display:block; 
           margin-top: 50px;    
       }
  </style>

</head>

<body>

  <center>


    <form id='form' method="post" enctype="multipart/form-data">
      <h1 id='head'>Sign in</h1>

      <label id='l1'>UserName</label>
      <input type="text" name="user"><br><br>
      <label>Password</label>
      <input type="password" name="code"><br><br>
      <!-- <input type="submit" name="submit" onclick="check()"> -->
      <button id='but' name="submit" autocomplete="off">submit</button>
      <a href="passwordreset.php" style="margin-left: 30px;text-decoration: none;" id='creat'>Forgot password</a>
      <a href="create.php" style="text-decoration: none;" id='create'>Create Account</a>

    </form>


  </center>


  <?php
    
   
  if (isset($_POST['submit'])) {

    $username = $_POST['user'];
    $password = $_POST['code'];

    $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
    $sql = "select stu_name,stu_pass from newuser where stu_name='$username' and stu_pass='$password'";

    $result = mysqli_query($con, $sql);
    
    $c = mysqli_num_rows($result);

    if ($c > 0) {

      echo "<h5 style=text-align:center> Login Successful </h5>";

      if ($username == 'admin'  &&  $password == '9590') {
        session_start();
        $_SESSION['user'] = $username;
        echo "<script>
            window.location.assign('index.php');
            alert('Login Successfull');
            </script>";
      } else {
        session_start();
        $_SESSION['user'] = $username;
        echo "<script>
            window.location.assign('index.php');
            alert('Login Successfull');
            </script>";
      }
    } else {
      echo "<h5 style=text-align:center> Login Not Successful </h5>
        <script>alert('check the entered details')</script>";
    }
  }


 
  require_once "header/footer.php";

  ?>


</body>

</html>