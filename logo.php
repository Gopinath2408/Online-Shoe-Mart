<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .logo {

            width: 50%;
            height: 400px;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            position: absolute;
            background-image: url("images/logo_2.jpg");
            background-size: 100% 100%;
            box-shadow: 1px 2px 10px 5px  black;
            animation: slider 10s infinite linear;
           
        }
        
        @keyframes slider {
            0%{
                 background-image: url("images/Mens casual leather slipper.jpg");
            }
            35%{
                background-image: url("images/formal.jpeg");
            }
            75%{
                background-image: url("images/loafer.jpg");
            }
            
        }
        #head {

            text-decoration: double;
            text-align: center;
            color: brown;

        }
    </style>
</head>

<body>
   
    <div class="logo">

       


        <!-- <div id="head">

            <h1>Welcome</h1>
        </div> -->



    </div>

</body>

</html>