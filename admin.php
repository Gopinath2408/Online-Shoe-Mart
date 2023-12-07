<!DOCTYPE html>
<html lang="en">
<?php
  require_once  "header/nav.php";
 
?>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>

   <style>
      body {
         background-image: url("images/background_template.jpg");
      }

      #f1 {
         padding: 20px;
         width: 100px;
         display: inline-block;
      }

      #form {
         background: rgba(130, 112, 250, 0.952);
         margin-top: 100px;
         width: 390px;
         height: 450px;
         border-radius: 1rem;
         box-shadow: 0rem 0rem 3.57rem 1rem #796F79;
         padding: 40px;
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

      label,
      input {
         padding: 10px;
         width: 100px;
         display: inline-block;
      }

      #but:hover {
         background-color: forestgreen;
         color: white;
      }

      h1 {
         text-transform: capitalize;
         color: darkblue;
      }

      table {
         padding: 30px;
      }

      table td {
         padding: 40px;
         /* border: 1px solid rgb(234, 255, 3); */
         text-align: center;


      }
   </style>
</head>

<body>
   <center>
      <table>
         <tr>
            <td>

               <form method="post" enctype="multipart/form-data" id="form">
                  <h1>Upload your image</h1>
                  <label id='f1'>Choose Image</label>
                  <input type="file" name="img" required><br>
                  <label id='f1'>Brand</label>
                  <input type="text" name="te" required><br>
                  
                  <label id='f1'>Enter the price</label>
                  <input type="text" name="rup" required><br><br>
                  <label id='f1'>Enter the available Size</label>
                  <input type="text" name="size" required>
                  <input type="submit" name="submit" id="but" autocomplete="off">

               </form>

            </td>
            <td>

               <form method="post" enctype="multipart/form-data" id="form">
                  <h1> To Change Price and Size</h1>
                  <label id='f1'>Enter the Shoe name</label>
                  <input type="text" name="img_n"><br>
                  <label id='f1'>Price</label>
                  <input type="text" name="rupee"><br><br>
                  <label id='f1'>Size</label>
                  <input type="text" name="siz">
                  <input type="submit" name="sub" id="but" autocomplete="off">

               </form>

            </td>
         </tr>

      </table>
   </center>




   <?php
   if (isset($_POST["submit"])) {
      //  $img_name=$_POST['img'];

      $image = $_FILES['img']['tmp_name'];
      // $name = $_FILES['img']['nam'];
      $name=$_POST['te'];
      $price = $_POST['rup'];

      $image = file_get_contents($image);
      $image = base64_encode($image);

      $se = $_POST['size'];

      $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
      $sql = "insert into image(img_name,Size,img,price) values('$name','$se','$image',$price)";
      $result = mysqli_query($con, $sql);
   } else if ((isset($_POST["sub"]))) {
      $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
      $size = $_POST['siz'];
      $pr = $_POST['rupee'];
      $na = $_POST['img_n'];

      $sql = "update image set Size='$size',price='$pr' where img_name='$na'";
      $result = mysqli_query($con, $sql);
   }

 

   require_once "header/footer.php";


   ?>
</body>

</html>