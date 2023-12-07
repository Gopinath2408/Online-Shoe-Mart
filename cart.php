<?php

// session_start();
require_once  "header/nav.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" href="D:/xampp/htdocs\web_project/icons8-shopping-cart-96.png"> -->
  <title>Cart</title>
  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    function refresh() {
      window.location.reload();
    }
  </script>

  <style>
    .parent1 {

      width: 350px;
      padding: 50px;
      margin-left: 12px;
      margin-top: 14px;
      text-align: center;
      border-radius: 20px;
      border: 2px solid #f0f0f0;
      background-color: white;
      border: 1px solid rgb(234, 255, 3);
    }

    .parent1 img {
      /* padding: 5px; */
      height: 150px;
      width: 150px;

    }

    .parent1 h5 {
      text-align: center;
      text-transform: capitalize;
    }

    .parent1 h2 {
      text-align: center;
    }


    #buy {

      /* border-radius: 15px;
      border: 1px solid #4D71A7;
      padding: 10px;
      margin-left: 70px;
      text-decoration: none;
      color: black;
      background-color: white; */

      border: 1px solid rgb(234, 255, 3);
      border-radius: 15px;
      font-size: 15px;
      color: black;
      text-decoration: none;
      padding: 10px;
      background-color: white;


    }

    #buy:hover {
      background-color: green;
      color: white;

    }

    #p2 {

      /* width: 20%;
      padding: 10px;
      border: 1px solid #4D71A7;
      border-radius: 15px;
      margin-right: 98px;
      color: black;
      background-color: white;
      font-size: 15px; */

      border-radius: 15px;
      border: 1px solid rgb(234, 255, 3);
      padding: 12px;
      margin-left: 60px;
      text-decoration: none;
      color: black;
      background-color: white;
      font-size: 15px;


    }

    #p2:hover {
      background-color: red;
      color: wheat;
    }

    body {
      font-family: 'nunito', sans-serif;
      background-color: #f0f0f0;
      background-image: url("images/background_template.jpg");
    }

    .total_section {

      display: grid;
      grid-template-columns: repeat(3, 33.33%);
    }

    .parent1:hover {
      background: rgba(53, 8, 177, 0.167);

    }

    .tot_amount {

      width: 15%;
      text-align: center;
      margin-top: 90px;
      padding: 2px;
      margin-left: 83%;
      border: 2px solid #4D71A7;
      background-color: #f0f0f0;

    }

    #but {

      border-radius: 15px;
      border: 1px solid rgb(234, 255, 3);
      padding: 12px;
      margin-left: 20px;
      text-decoration: none;
      color: black;
      background-color: white;
      font-size: 15px;
    }

    #but:hover {
      background-color: forestgreen;
      color: white;
      transition-duration: 0.4s;
    }

    #incr_decr {
      margin-left: 140px;
      display: flex;
    }

    #incre {
      margin-left: 10px;
      height: 30px;
    }

    #decre {
      margin-right: 10px;
      height: 30px;
    }

    .dis {

      margin-top: 10px;
    }
  </style>
  <!-- price total -->
  <script>
    var b = 0;
    let c = 0;

    function add(data) {
      b = b + data;


    }

    function increment(img_id, counter) {
      var name = img_id;

      let c = document.getElementById(counter).innerHTML;
      let b = parseInt(c);
      b = b + 1;

      document.getElementById(counter).innerHTML = b;

      $.post(
        "quantity.php", {
          name: name,
          nam: b
        }
      );


    }

    function decrement(img_id, counter) {
      let c = document.getElementById(counter).innerHTML;
      let b = parseInt(c);
      b = b - 1;
      document.getElementById(counter).innerHTML = b;



    }
  </script>
</head>

<body>

  <h1 style="text-align:center; color:#FFFFFF;text-transform:uppercase">Cart </h1>
  <div class='total_section'>
    <?php


    $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
    $s = $_SESSION['user'];

    // to delete ordered details from cart

    $sql = "delete from cart where status='false'";
    $result = mysqli_query($con, $sql);

    // to add the item to cart

    if (isset($_REQUEST["name"])) {

      $name = $_REQUEST['name'];
      $size = $_REQUEST['nam'];
      $sql = "select id from newuser where stu_name='$s'";
      $result = mysqli_query($con, $sql);

      if ($row = $result->fetch_assoc()) {
        $q = "select img_id,user_id from cart where img_id='$name' and user_id='{$row['id']}'";
        $resp = mysqli_query($con, $q);
        $count = mysqli_num_rows($resp);
      }


      if ($count > 0) {
        echo "Already exists";
      } else {
        $sql = "select id from newuser where stu_name='$s'";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {

          $sql = "insert into cart(user_id,img_id,Size) values('{$row['id']}','$name','$size')";
          $result = mysqli_query($con, $sql);
        }
      }





      // $sql = "select id from newuser where stu_name='$s'";
      // $result = mysqli_query($con, $sql);



      // if ($row = $result->fetch_assoc()) {

      //   $sql = "insert into cart(user_id,img_id) values('{$row['id']}','$name')";
      //   $result = mysqli_query($con, $sql);


      // }


    }


    //to display the cart product
    $sql = "select id from newuser where stu_name='$s'";
    $result = mysqli_query($con, $sql);
    if ($row = $result->fetch_assoc()) {

      $sql = "select img_id from cart where user_id={$row['id']} and status ='true'";
      $resul = mysqli_query($con, $sql);
      $n = 1;
      while ($row = $resul->fetch_assoc()) {

        $sql = "select * from image where img_id={$row['img_id']}";
        $result = mysqli_query($con, $sql);

        while ($row = $result->fetch_assoc()) {
          $id = $row['img_id'];

          echo " 
        <div class=parent1>
        <center>
        <img  src='data:image;base64,{$row["img"]}'>
        </center>
        <h5>{$row['img_name']}</h5>
        <h2 id='pr' data-price='{$row['price']}'>₹{$row['price']}</h2>
        <div id='incr_decr'>
        <button id='decre' onclick=decrement({$row['img_id']},$n)>-</button>
        <h4 id='$n' class='dis'>0</h4>
        <button id='incre' onclick=increment({$row['img_id']},$n)>+</button>
        </div>
        <a id='buy' href=delivery.php?id=$id'>Buynow</a>
        <button id='p2' onclick=remove('{$row['img_id']}')>Remove</button>
        
        <script>
         
        var a={$row['price']}
                  add(a);
       
        </script>
        </div>";

          $n = $n + 1;
        }
      }
      echo '</div>';
    }


    echo "<script>function remove(data)
    {
        var name=data;
        alert('Successfully removed from cart');
        $.post(
          'cart_remove.php',
           {name:name}            
         );
         window.location.reload();
       
    }</script>";


    // <!-- displaying total price -->

    echo "<div class='tot_amount'>
    <form id='amount'>
    <label id='tot'>Total Amount</label>
    <h2 id='out'></h2>
    <button  id='but'><a href='delivery.php' style='text-decoration:none;color:black'>Place order</a></button>
    </form>
    </div>";

    require_once "header/footer.php";
    ?>

    <script>
      if (b > 0)
        document.getElementById('out').innerHTML = b;
      else {
        document.getElementById('out').innerHTML = "Nothing in cart";
        document.getElementById('tot').innerHTML = "";
        document.getElementById('but').innerHTML = "😑";
      }
    </script>

</body>

</html>