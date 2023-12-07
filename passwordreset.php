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
            width: 190px;
            height: 170px;
            border-radius: 1rem;
            box-shadow: 0rem 0rem 7rem 1rem #796F79;
            padding: 90px;
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
            display: flow-root;
            padding: 20px;
            
        }

        #but:hover {
            background-color: forestgreen;
            color: white;
        }

        body {
            background-image: url("images/background_template.jpg");
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <center>
        <form method="post" id='form' enctype="multipart/form-data">

            <label>Gmail</label>
            <input type="email" name="mail" required><br>
            <button id='but' name="submit" autocomplete="off">submit</button>

        </form>
    </center>
    <?php

    if (isset($_POST["submit"])) {


        $gmail = $_POST['mail'];
        $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
        $sql = "select stu_email from newuser where stu_email='$gmail' ";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {

            if ($gmail == $row['stu_email']) {
                session_start();
                $_SESSION['gmail'] = $gmail;
                header("Location:updatepass.php");
            }
        } else {
            echo "<script>alert('Incorrect Mail Id!')";
        }
    }
  
    require_once "header/footer.php";

    ?>


</body>

</html>