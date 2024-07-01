 <?php
include "config.php";
session_start();
if($_SESSION){


if (!isset($_SESSION['email']) || !isset($_SESSION['pass'])) {
    header("location:index.php");
    exit();
}
}else{
    header("location:login.php"); 

}

$email = $_SESSION['email'];
$sql = "SELECT * FROM `admin_info` WHERE `email` = '$email'";
$res = mysqli_query($con, $sql);
$row2 = mysqli_fetch_assoc($res);


if (!$row2) {
   
    echo "Admin information not found";
    exit();
}

 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AdminPanal</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/midea.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/midea.css">
    <link rel="author" href="https://plus.google.com/113101541449927918834" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
        integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
        integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">

    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>

.a{
    transition: .5s;
    height: 150px;
    width: 48% !important;
    /* border: 1px solid black; */
border-radius: 20px;
background-color:#202528 !important;
padding: 10px 18px;
position: relative;
/* box-shadow: 0 0 10px 3px black; */
}
.c{
    background-color:#202528 !important;

}
.d{
    background-color:#202528;
}
.e{
    background-color:#202528;
}
.b{
    height: 150px;
    width: 20%;
    /* background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%); */
    background-color:#202528;

    /* border: 1px solid black; */
border-radius: 20px;
/* background-color:#202528; */
padding: 10px 18px;
position: relative;
}
    </style>
</head>

<body>


    <!-- aside start -->
    <aside class="animate__animated animate__fadeInLeft">
        <div class="top">
            <div class="logo">
                <img class="animate__animated animate__rotateInDownLeft" src="immg/mylogo-transformed.png" alt="">
            </div>

        </div>
        <!-- end top -->
        <div class="sidebar">
            <a href="index.php" id="bb" class="activ">
                <span class="material-symbols-outlined">
                    grid_view</span>
                <h3>Dashbord</h3>
            </a>


            <a href="customer.php" class="">
                <span class="material-symbols-outlined">
                    person_outline</span>
                <h3>Customer</h3>
            </a>
            <a href="admin_info.php">
                <span class="material-symbols-outlined">
                    insights</span>
                <h3>admin info</h3>
            </a>
            <a href="order_details.php">
                <span class="material-symbols-outlined">
                    insights</span>
                <h3>Order Details</h3>
            </a>

            <a href="massage.php">
                <span class="material-symbols-outlined">
                    mail_outline</span>
                <h3>Message</h3>
                <?php
              $sql="SELECT * FROM `contact_details`";
              $res=mysqli_query($con,$sql);
              while($row=mysqli_fetch_assoc($res))
              {
                $id=$row['id'];
              }
              ?>
                <span class="msg">
                    <?php echo $id ?>
                </span>
            </a>

            <a href="products.php">
                <span class="material-symbols-outlined">
                    receipt_long</span>
                <h3>Products</h3>
            </a>

            <a href="report.php">
                <span class="material-symbols-outlined">
                    report_gmailerrorred</span>
                <h3>Reports</h3>
            </a>
            <a href="seting.php">
                <span class="material-symbols-outlined">
                    settings</span>
                <h3>Settings</h3>
            </a>


            <a href="addptoduct.php">
                <span class="material-symbols-outlined">
                    add</span>
                <h3>Add Product</h3>
            </a>

            <a href="logout.php" id="a">
                <span class="material-symbols-outlined">
                    logout</span>
                <h3>Logout</h3>
            </a>
        </div>

    </aside>
    <!-- aside end  -->

    <!-- main section start -->
    <main>
        <div class="i animate__animated animate__backInDown"> <i class="fa-solid fa-bars" id="bars"></i>
            <?php
              $sql="SELECT * FROM `contact_details`";
              $res=mysqli_query($con,$sql);
              $id=0;
              while($row=mysqli_fetch_assoc($res))
              {
                $id++;
              }
              ?>
            <div class="icon" style="width:28%;">
                <a href="massage.php">
                    <i class="fa-solid fa-comment-dots " id="bars"><span class="msg"><?php echo $id?>
                
                </span></i>
                </a>
                <?php
              $sql="SELECT * FROM `chackout`";
              $res=mysqli_query($con,$sql);
              $id=0;

              while($row=mysqli_fetch_assoc($res))
              {
                $id++;
              }
              ?>
              <a href="order_details.php">
                <i class="fa-solid fa-envelope" id="bars"><span class="msg">
                        <?php  echo $id;?>
                    </span></i>
              </a>
                <?php
              $sql="SELECT * FROM `user_info`";
              $res=mysqli_query($con,$sql);
              $a=0;
              while($row=mysqli_fetch_assoc($res))
              {
                $id++;
              }
              ?>
              <a href="customer.php">

                <i class="fa-solid fa-bell" id="bars"><span class="msg">
                        <?php  echo $id;?>
                    </span></i>
                    </a>
                <div class="hmm">
                    <img src="immg/avatar-01.jpg" alt="">
                    <a href="seting.php"><?php echo  $row2['name']. " ".$row2['last_name'] ?></a>
                </div>
            </div>
        </div>
        <h1 class="animate__animated animate__backInDown">Dashbord</h1>
        <div class="togal">
            <div class="mode">
                Dark mode:
                <span class="change">OFF</span>
            </div>
        </div>

        <div class="date animate__animated animate__backInDown">
            <input type="date" value="<?php  $currentDate = date('Y-m-d'); echo $currentDate;?>">
        </div>

        <div class="main1">
            <div class="mainh">
                <h1>Overview</h1>
                <a href="addptoduct.php">+ADD ITEM</a>

            </div>
            
            <div class="card">
                <div class="cardm">

                    <div class="a b  animate__animated  animate__backInLeft " style="background-color:#202528 ">
                        <h1><i class="fa-solid fa-user"></i>
                        </h1>
                        <?php
              $sql="SELECT * FROM `user_info`";
              $res=mysqli_query($con,$sql);
              $id=0;
              while($row=mysqli_fetch_assoc($res))
              {
                $id++;
            
              }
              ?>
                        <h1> <span class="counter"><?php echo $id ?></span> </h1> <span class="t" style="font-size:15px;">Total customers</span>
                        <p><span class="counter">95</span>%</p>
                        <div class="l">
                            <div class="l1"></div>
                        </div>
                    </div>
                    <div class="a c animate__animated  animate__backInLeft">
                        <h1><i class="fa-solid fa-cart-shopping"></i>
                        </h1>
                        <?php
              $sql="SELECT * FROM `chackout`";
              $res=mysqli_query($con,$sql);
              $id=0;
              while($row=mysqli_fetch_assoc($res))
              {
                $id++;
              }
              ?>

                        <h1 class="counter"><?php echo $id ?></h1> <span class="w"style="font-size:15px;">items solid</span>
                        <p id="p2"><span class="counter">65</span>%</p>
                        <div class="l2">
                            <div class="la"></div>
                        </div>
                    </div>
                    <div class="a d animate__animated  animate__backInRight">
                        <h1><i class="fa-solid fa-calendar-days"></i>
                        </h1>
                        <?php
              $sql="SELECT * FROM `product_detail`";
              $res=mysqli_query($con,$sql);
              $id=0;
              while($row=mysqli_fetch_assoc($res))
              {
                $id++;
              }
              ?>
                        <h1> <span class="counter"><?php echo $id?></span></h1> <span class="m"style="font-size:15px;">Total items</span>
                        <p id="p3"><span class="counter">75</span>%</p>
                        <div class="l3">
                            <div class="lb"></div>
                        </div>
                    </div>
                    <div class="a e animate__animated  animate__backInRight">
                        <h1><i class="fa-solid fa-dollar-sign"></i>
                        </h1>
                        <?php
                     $sql = "SELECT * FROM `chackout`";
    $res = mysqli_query($con, $sql);
    $annual = 0; 
    while ($row = mysqli_fetch_assoc($res)) {
        $price = $row['price'];
        $quantity = $row['quantity'];
        $subtotal = $price * $quantity; 
        $annual += $subtotal; 
          }
    
          ?>

                        <h1>$<span class="counter"><?php echo  $annual?></span>/-</h1> <span
                            class="anual" style="font-size:15px;">Anual</span>
                        <p id="p4"><span class="counter">85</span>%</p>
                        <div class="l4">
                            <div class="lc"></div>
                        </div>
                    </div>


                </div>

            </div>
            
        </div>

        <!-- start recent oredr -->
        <div class="recentm">
            <div class="recent_order">
                <h2>Recent Orders</h2>
                <table class="">
                    <thead>
                        <tr class="animate__animated animate__slideInUp">
                            <th>Product Name</th>
                            <th>Product quantity</th>
                            <th>Payments</th>
                            <th>Status</th>
                            <th>Details</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
    $sql = "SELECT * FROM `chackout`";
    $res = mysqli_query($con, $sql);
    $annual = 0; 
    while ($row = mysqli_fetch_assoc($res)) {

    
    ?>
                        <tr class="animate__animated animate__slideInDown">
                            <td><?php echo $row['pr_name']?></td>
                            <td class="counter"><?php echo $row['quantity']?></td>
                            <td>Case On Delivery</td>
                            <td class="warning">Pending</td>
                            <td class="primary"><a href="order_details.php">Details</a></td>
                        </tr>
                        <?php
    }

       ?>
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>

            <!----------------
        start right main 
      ---------------------->
            <div class="right">


                <div class="update">
                    <div class="profile">
                        <img src="./immg/profile-4.jpg" alt="" />
                    </div>
                    <div class="message">
                        <p><b>Ramzan</b> Recived his order of Apple</p>
                    </div>
                </div>



                <div class="update">
                    <div class="profile">
                        <img src="./immg/profile-3.jpg" alt="" />
                    </div>
                    <div class="message">
                        <p><b>Ramzan</b> Recived his order of Vagitable</p>
                    </div>
                </div>

                <div class="update">
                    <div class="profile">
                        <img src="./immg/profile-2.jpg" alt="" />
                    </div>
                    <div class="message">
                        <p><b>Sidhharth</b> Recived his order of Dals</p>
                    </div>
                </div>

            </div>
        </div>
      
    </main>







</body>

<script>
jQuery(document).ready(function($) {
    $('.counter').counterUp({
        delay: 5,
        time: 2000
    });
});
</script>
<script>
$(document).ready(function() {
    $("#bars").click(function() {
        $("aside").toggleClass("add");
        $("main").toggleClass("adm");
    });

});
</script>

<script>
$(".change").on("click", function() {
    if ($("main").hasClass("dark")) {
        $("aside").removeClass("dark");
        $(".tb").removeClass("dark");
        $("main").removeClass("dark");
        $(".change").text("OFF");
    } else {
        $("aside").addClass("dark");
        // $( ".tb" ).addClass( "dark" );
        $(".right").css(" background-color", "black");

        $("aside").css("box-shadow", "none");
        $("main").addClass("dark");

        $(".change").text("ON");
    }
});
</script>


<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

</html>