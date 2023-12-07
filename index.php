<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="icons/official-store.png">
  <title>Shoe mart</title>
  <link rel="stylesheet" href="style.css">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

  <script>
    function cart(data) {
      var size = window.prompt("Enter the size of the item");
      
      var name = data;

      $.post(
        "cart.php", {
          name: name,
          nam: size
        }

      );

    }

    function lock() {

      alert(" Logout Successfully");

    }

    function sample() {
      alert("Login to continue");
    }

    function rem(data) {

      var name = data;
      alert('Successfully removed');
      $.post(
        "admin_photo_remove.php", {
          name: name
        }
      );
      window.location.reload();

    }
  </script>

  <nav>
    <div class="title">
      <header>Online Shoe Mart</header>
    </div>
    <div class="info">
      <ul>

        <?php


        session_start();
        if (!(isset($_SESSION['user']))) {
          echo "<li><a href='index.php' style='text-decoration: none;color: black;'><img src='images/bootstrapimages/house.svg'></a></li>";
          echo "<li><a href='login.php' target='_blank' style='text-decoration: none;color: black; ' name='ch'><img src='images/bootstrapimages/box-arrow-in-left.svg'></a></li>";
        } else {
          if ($_SESSION['user'] == 'admin') {

            echo "<li><a href='index.php' style='text-decoration: none;color: black;'><img src='images/bootstrapimages/house.svg'></a></li>";
            echo "<li><a href='admin.php' target='_blank' style='text-decoration: none;color: black; ' name='ch'><img src='images/bootstrapimages/cloud-upload.svg'></a></li>
               <li onclick='lock()'><a href='logout.php' style='text-decoration:none;color:black'><img src='images/bootstrapimages/box-arrow-right.svg'></a></li>
               <li><a href='admin_ordered_details.php' style='text-decoration: none;color: black;'><img src='images/bootstrapimages/cart4 (1).svg'></a></li>";
          } else {

            echo  "<li><a href='index.php' style='text-decoration: none;color: black;'><img src='images/bootstrapimages/house.svg'></a></li>
                      <li><a href='profile.php' style='text-decoration:none;color:black'><img id='img' src='images/bootstrapimages/person.svg'></li>

                       <li onclick='lock()'><a href='logout.php' style='text-decoration:none;color:black'><img src='images/bootstrapimages/box-arrow-right.svg'></a></li>
                       <li><a href='cart.php' style='text-decoration: none;color: black;'><img src='images/bootstrapimages\cart4 (1).svg'></a></li>";
          }
        }
        ?>

      </ul>
    </div>
  </nav>
  <!-- <center>
    <div class="logo">
     
    
      <div id="head">

            <h1>Welcome</h1>
        </div> -->

    </div>
   

  


  <div class="main_page">
    <?php

    $con = mysqli_connect("localhost:3306", "root", "", "web_project1");
    $sql = "select * from image";
    $result = $result = mysqli_query($con, $sql);
    echo "<div class='pg_body'>";
    while ($row = $result->fetch_assoc()) {

      echo " 
      <div class=parent>
     <img  src='data:image;base64,{$row["img"]}'>
     <h5>{$row['img_name']}</h5>
     <h2>₹{$row['price']}</h2>
     <h5>Size:{$row['Size']}</h5>";

      if (!isset($_SESSION['user'])) {
        echo "<button onclick=sample() class='p1'>Add to cart</button>
       <button id='buy' onclick=sample() >Buy Now</button>
       </div>";
      } else {

        if ($_SESSION['user'] != 'admin') {
        
          echo "<button onclick=cart('{$row['img_id']}')  class='p1' id='change_color'>Add to cart</button>
         <a id='buy' href='delivery.php?id={$row['img_id']}'>Buynow</a>
        
        </div>";
        } else {

          echo "
        <button id='removeimg' onclick=rem('{$row['img_id']}')>Remove</button>
                 
        </div>";
        }
      }
    }

    echo "</div>";


    ?>
  </div>



  <center>
    <footer id="foot">
    <marquee id='floot'>
             Online Shoe Mart
          </marquee> <br>

      <h3>A SIMPLE COMPANY SINCE 1991</h3>

      <h2>We make premium footwear for ordinary people.</h2>

      <table>
        <tr>
          <th>ABOUT SIMPLE</th>
          <th>GET TO KNOW US!</th>
          <!-- <th>HELP</th> -->

        </tr>

        <tr>

          <td>

            Elevated sneakers born from the '90s.

          </td>

          <td>

            <a href="contactus.php">Contact us</a>

          </td>

        </tr>

      </table>

      <div id='profile'>

        <a href="https://www.linkedin.com/in/gopinath-sakthivel-b53964224?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app " id="linkdln"><img src="images/bootstrapimages/linkedin.svg"></a>
        <a href="https://github.com/Gopinath2408"><img src="images/bootstrapimages/github.svg" id="github"></a>
        <a href="https://instagram.com/_new_born_legend_?igshid=NzZlODBkYWE4Ng== "><img src="images/bootstrapimages/instagram.svg" id="insta"></a>
      </div>
    </footer>
  </center>


</body>

</html>