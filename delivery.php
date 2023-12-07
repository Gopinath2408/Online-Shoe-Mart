<!DOCTYPE html>
<html lang="en">
<?php
  require_once  "header/nav.php";
  
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="icons/delivery-man.png">
  <title>Delivery Process</title>
  <style>
    body {
      background-image: url("images/background_template.jpg");
    }



    form {
      background: rgba(130, 112, 250, 0.952);
      margin-top: 180px;
      width: 490px;
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

    #but:hover {
      background-color: forestgreen;
      color: white;
    }

    label,
    input {
      padding: 12px;
    }
  </style>

  <!-- <script>

        function confirm()
        {
            alert("Successfully ordered");
             
        }


    </script> -->
</head>

<body>

  <center>
    <div class="box">
      <?php
      // session_start();
      $s = $_SESSION['user'];
      $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
      $sql = "select * from newuser where stu_name='$s'";
      $result = mysqli_query($con, $sql);

      if ($row = $result->fetch_assoc()) {
        echo "<form method='post' name='userdetails' id='form' enctype='multipart/form-data'>
            <br><label>Name</label>
            <input type='text' name='user' value='{$row['stu_name']}'>
            <label >DoB</label>
            <input type='date' name='da' value='{$row['stu_date']}'><br><br>
            <label>Mobile</label>
            <input type='number' name='num' value='{$row['stu_phone']}'>
            <label>Email</label>
            <input type='text' name='mail' value='{$row['stu_email']}'><br><br>
            <label>Address</label>
            <textarea name='ad' rows='4' cols='30' placeholder='Enter the correct address' required></textarea><br><br>
     
            <input type='checkbox'>
            <label>Cash on Delivery</label><br>
             
            <h3>or</h3>
            <label>Gpay</label>
            <input type='text' value=9994863872><br>
           
           
            <button type='submit'  name='submit' id='but' autocomplete='off'>Submit</button>            
            </form>";
      }

         
      if (isset($_GET['id'])) {
     
        $product_id = intval($_GET['id']);
        
        echo "<script> document.cookie='size='+window.prompt('Enter the size of the item');
             
        </script>";

        $size=$_COOKIE['size'];
        
        $sql = "select id from newuser where stu_name='$s'";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {
          $user_id = $row['id'];
          $query = "Select img_name,price from image where img_id=$product_id";
          $result = mysqli_query($con, $query);


          if ($row = $result->fetch_assoc()) {
            if (isset($_POST["submit"])) {
              $Address = $_POST['ad'];
              $query = "insert into ordered_details(user_id,Address,Product_name,Size,price,time) values('$user_id','$Address','{$row['img_name']}',$size,{$row['price']},NOW())";
              $result = mysqli_query($con, $query);
              $sql = "update cart set status='false' where img_id=$product_id";
              $result = mysqli_query($con, $sql);
              header("Location:ordered_sucess.php");
            }
          }
        }
      } else {
        if (isset($_POST["submit"])) {
          $Address = $_POST['ad'];
          $sql = "select id from newuser where stu_name='$s'";
          $result = mysqli_query($con, $sql);

          if ($row = $result->fetch_assoc()) {
            $user_id = $row['id'];
            $query = "Select img_id,Size,quantity from cart where user_id=$user_id";
            $result = mysqli_query($con, $query);


            while ($row = $result->fetch_assoc()) {
              

              $query = "Select img_name,price from image where img_id={$row['img_id']}";
              $Size=$row['Size'];
              $quan=$row['quantity'];
              
              $resul = mysqli_query($con, $query);

              $sql = "update cart set status='false' where user_id=$user_id";
              $re = mysqli_query($con, $sql);

              while ($row = $resul->fetch_assoc()) {
                $query = "insert into ordered_details(user_id,Address,Product_name,Size,quantity,price,time) values('$user_id','$Address','{$row['img_name']}',$Size,$quan,{$row['price']},NOW())";
                $res = mysqli_query($con, $query);
              }
            }
          }
          header("Location:ordered_sucess.php");
        }
      }
       
      ?>

    </div>
  </center>

  <?php

  require_once "header/footer.php";
?>
</body>

</html>