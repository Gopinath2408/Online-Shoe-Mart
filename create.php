<!DOCTYPE html>
<html lang="en">
    <?php

    // session_start();
      require_once "header/nav.php";
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form {
            background: rgba(130, 112, 250, 0.952);
            margin-top: 100px;
            width: 420px;
            height: 500px;
            border-radius: 1rem;
            box-shadow: 0rem 0rem 3.57rem 1rem #796F79;
            padding: 20px;
            border: 2px solid yellow;

        }

        #but {

            border-radius: 15px;
            border: 1px solid #09e783;
            padding: 15px;
            margin-left: 16px;
            background-color: white;
            font-size: 14px;

        }

        #but:hover {
            background-color: forestgreen;
            color: white;
        }
        #form label{
          
           display:flow-root;
           padding: 8px;
           
            
        }
        #form input{
            padding: 5px;
           
        }

        body {
            background-image: url("images/background_template.jpg");
        }
    </style>
</head>

<body>
    <center>
        <h1 style="color:rgb(241, 241, 241);">Welcome!!</h1>

        <form id="form" method="post" action="connect.php">

            <label id="l1">Name</label>
            <input type="text" name="name"><br><br>
            <label>Date of Birth</label>
            <input type="date" name="birth"><br><br>
            <label>Mobile Number</label>
            <input type="number" name="mobile"><br><br>
            <label>Gmail</label>
            <input type="email" name="mail"><br><br>
            <label>Create Password</label>
            <input type="password" name="newpass"><br><br>
            <button id="but">Submit</button>
            <br>

        </form>

    </center>
    <?php

  require_once "header/footer.php";
?>
</body>

</html>