<style>

nav {
     /* background-color: rgba(145, 154, 185, 0.438); */
     background-color: rgba(145, 154, 185, 0.438);
     display: flex;
     justify-content: space-between;
     margin-top: -8.30px;
   
     width: 100%;
     padding: 0;
     

 }


 nav .title {
     padding-top: 14px;
     padding-left: 40px;
     font-size: 20px;
     font-weight: 100%;
     
     font-family: cursive;
     color:#FFFFFF;
 }

 .info li {

     text-decoration: none;
     display: inline;
     /* padding: 30px; */
     margin-right: 30px;
     color: black;
     text-transform: uppercase;

 }
</style>
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
                       <li><a href='cart.php' style='text-decoration: none;color: black;'><img src='images\bootstrapimages\cart4 (1).svg'></a></li>";
          }
        }
        ?>

      </ul>
    </div>
  </nav>