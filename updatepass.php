<!DOCTYPE html>
<html lang="en">
<?php
  require_once  "header/nav.php";
 
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #form {
      background: rgba(130, 112, 250, 0.952);
      margin-top: 180px;
      width: 180px;
      height: 160px;
      border-radius: 1rem;
      box-shadow: 0rem 0rem 7rem 1rem #796F79;
      padding: 50px;
      border: 2px solid yellow;


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
    label{
      padding: 30px;
      display: flex;
    }

    body {
      background-image: url("images/background_template.jpg");
    }

    #but:hover {
      background-color: forestgreen;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  $gmail = $_SESSION['gmail'];

  echo "<center> <form method='post' id='form' enctype='multipart/form-data'>
        
    <label>Create Password</label>
    <input type='password' name='pass' required><br>

    <button id='but' name='Submit' autocomplete='off'>Submit</button>

      </form></center>";



  if (isset($_POST['Submit'])) {

    $newpass = $_POST['pass'];
    $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
    $sql = "update newuser set stu_pass='$newpass' where stu_email='$gmail'";
    $result = mysqli_query($con, $sql);
  }

 
  require_once "header/footer.php";
?>
  ?>
</body>

</html>