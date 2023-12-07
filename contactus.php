<!DOCTYPE html>
<html lang="en">
<?php
require_once  "header/nav.php";

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>

    <style>
        #des {
            text-align: center;
            white-space: nowrap;
            line-height: 40px;
        }

        #req {
            text-align: center;
        }

        #req input,
        textarea {
            padding: 10px;
            width: 50%;
            border: 1px solid rgb(3, 66, 255);

        }

        #head {
            margin-left: 300px;
        }

        #sub {

            border-radius: 15px;
            border: 1px solid rgb(74, 3, 255);
            padding: 12px;
            margin-left: 60px;

            color: black;
            background-color: white;
            font-size: 15px;
        }

        #sub:hover {
            background-color: rgb(80, 34, 139);
            color: white;
            transition-duration: 0.4s;
        }

        body {
            font-family: 'nunito', sans-serif;
            background-color: #f0f0f0;
            background-image: url("images/background_template.jpg");
        }
    </style>
</head>

<body>
    <h4 id="head">CONTACT</h4>


    <p id="des">
        We'd love to hear from you.<br>
        Send us any questions, comments, or ideas.<br>
        Please feel free to send us an email anytime and we'll get back to you ASAP.<br>

        Or if you would like to fill out a form, we've got one for you below <br>
    </p>

    <form id="req" action="https://formsubmit.co/4ff45f5773a11c907cb5574b6bd36d72" method="POST">
        <input type="text" required placeholder="Name" name="name"><br><br>
        <input type="gmail" required placeholder="Email" name="mail"><br><br>
        <input type="number" required placeholder="Your Mobile" name="mess"><br><br>
        <textarea rows="20px" cols="40px" name="more" placeholder="Enter your question or message here" required></textarea><br><br>
        <button id="sub">Send</button>
    </form>
    <?php
    require_once  "header/nav.php";
    require_once "header/footer.php";
    ?>
</body>

</html>