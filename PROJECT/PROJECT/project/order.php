<?php
include "config.php";
session_start();
if($_SESSION){
if (!isset($_SESSION['email']) || !isset($_SESSION['pas'])) {
    header("location:index.php");
    exit();
}
}else{
    header("location:login.php"); 

}

$pas = $_SESSION['pas'];

$sql = "SELECT * FROM `user_info` WHERE  `pas`='$pas'";
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
    <title>Fruitables - Vegetable </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <script href="js/slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Customized Bootstrap Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .aaa .fruite-item:hover {
        box-shadow: 0 0 55px rgba(0, 0, 0, 0.4) !important;
    }

    .imgh:hover {
        transform: scale(1.1);
    }

    .aaa .fruite-item {
        overflow: hidden;
    }

    .fruite .fruite-item .fruite-img {
        overflow: hidden;
        transition: 0.5s;
        border-radius: 10px 10px 0 0;
    }

    .fruite .fruite-item .fruite-img img {
        transition: 0.5s;
    }

    /*** service Start ***/
    .service .service-item .service-content {
        position: relative;
        width: 250px;
        height: 130px;
        top: -50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    

#progressbar-1 {
color: #455A64;
}

#progressbar-1 li {
list-style-type: none;
font-size: 13px;
width: 33.33%;
float: left;
position: relative;
}

#progressbar-1 #step1:before {
content: "1";
color: #fff;
width: 29px;
margin-left: 22px;
padding-left: 11px;
}

#progressbar-1 #step2:before {
content: "2";
color: #fff;
width: 29px;
}

#progressbar-1 #step3:before {
content: "3";
color: #fff;
width: 29px;
margin-right: 22px;
text-align: center;
}

#progressbar-1 li:before {
line-height: 29px;
display: block;
font-size: 12px;
background: #455A64;
border-radius: 50%;
margin: auto;
}

#progressbar-1 li:after {
content: '';
width: 121%;
height: 2px;
background: #455A64;
position: absolute;
left: 0%;
right: 0%;
top: 15px;
z-index: -1;
}

#progressbar-1 li:nth-child(2):after {
left: 50%
}

#progressbar-1 li:nth-child(1):after {
left: 25%;
width: 121%
}

#progressbar-1 li:nth-child(3):after {
left: 25%;
width: 50%;
}

#progressbar-1 li.active:before,
#progressbar-1 li.active:after {
background: #1266f1;
}

.card-stepper {
z-index: 0
} #preloader {
    display: flex;
    position: fixed;
    inset: 0;
    width: 100%;
    height: 100vh;
    z-index: 99999;
  }
  
  #preloader:before,
  #preloader:after {
    content: "";
    background-color: #161718;
    position: absolute;
    inset: 0;
    width: 50%;
    height: 100%;
    transition: all 0.3s ease 0s;
    z-index: -1;
  }
  
  #preloader:after {
    left: auto;
    right: 0;
  }
  
  #preloader .line {
    position: relative;
    overflow: hidden;
    margin: auto;
    width: 1px;
    height: 280px;
    transition: all 0.8s ease 0s;
  }
  
  #preloader .line:before {
    content: "";
    position: absolute;
    background-color: #fff;
    left: 0;
    top: 50%;
    width: 1px;
    height: 0%;
    transform: translateY(-50%);
    animation: lineincrease 1000ms ease-in-out 0s forwards;
  }
  
  #preloader .line:after {
    content: "";
    position: absolute;
    background-color: #999;
    left: 0;
    top: 0;
    width: 1px;
    height: 100%;
    transform: translateY(-100%);
    animation: linemove 1200ms linear 0s infinite;
    animation-delay: 2000ms;
  }
  
  #preloader.loaded .line {
    opacity: 0;
    height: 100% !important;
  }
  
  #preloader.loaded .line:after {
    opacity: 0;
  }
  
  #preloader.loaded:before,
  #preloader.loaded:after {
    animation: preloaderfinish 300ms ease-in-out 500ms forwards;
  }
  
  @keyframes lineincrease {
    0% {
      height: 0%;
    }
  
    100% {
      height: 100%;
    }
  }
  
  @keyframes linemove {
    0% {
      transform: translateY(200%);
    }
  
    100% {
      transform: translateY(-100%);
    }
  }
  
  @keyframes preloaderfinish {
    0% {
      width: 5 0%;
    }
  
    100% {
      width: 0%;
    }
  }
    /*** service End ***/
    </style>
</head>
<body>
    
<div id="preloader">
        <div class="line"></div>
      </div>
         
<div class="container-fluid fixed-top">
       
       <table width="100%"  class="text-center m-auto" >
     <tr>
       <td id="">
         
 
         <div class="container-fluid se px-5 bg-dark text-dark py-lg-3" id="search-bar se" style="
         display: none;">
         <div class="container px-5  border border-dark" ><input type="search" id="search" name="" placeholder="Search products in our store" id="" class="form-control"></div>
       </div>
       </td>
     </tr>
    
     <tr>
       <td id="table-data">
       </td>
     </tr>
   </table>
 
 
             <div class="container topbar  d-none d-lg-block">
                 <div class="d-flex justify-content-between">
                     <div class="top-info ps-2">
                         <small class="me-3"><i class="fas fa-map-marker-alt me-2 " style="color: #ffb524;"></i> <a
                                 href="#" class="text-white">123 Street, New York</a></small>
                         <small class="me-3"><i class="fas fa-envelope me-2 " style="color: #ffb524;"></i><a href="#"
                                 class="text-white">Email@Example.com</a></small>
                     </div>
                     <div class="top-link pe-2">
                         <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                         <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                         <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                     </div>
                 </div>
             </div>
             <div class="container px-0">
                 <nav class="navbar navbar-light bg-white navbar-expand-xl">
                     <a href="index.php" class="navbar-brand">
                         <h1 class=" display-6" style="color: #81c408;">Fruitables</h1>
                     </a>
                     <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarCollapse">
                         <span class="fa fa-bars text-primary"></span>
                     </button>
                     <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                         <div class="navbar-nav mx-auto">
                             <a href="index.php" class="nav-item nav-link active">Home</a>
                             <a href="pagination/shop.php" class="nav-item nav-link">Shop</a>
                             <!-- <a href="shop-detail.php" class="nav-item nav-link">Shop Detail</a> -->
                             <div class="nav-item dropdown">
                                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                 <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                     <a href="cart.php" class="dropdown-item">Cart</a>
                                     <a href="chackout.php" class="dropdown-item">Chackout</a>
                                     <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                     <a href="404.php" class="dropdown-item">404 Page</a>
                                 </div>
                             </div>
                             <a href="order.php" class="nav-item nav-link active">Order Details</a>

                             <a href="contact.php" class="nav-item nav-link">Contact</a>
                         </div>
                         <div class="d-flex m-3 me-0">
                             <button
                                 class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                                 data-bs-toggle="modal" data-bs-target="#searchModal"id="se" ><i class="fas fa-search "
                                     style="color: #81c408;" ></i></button>
                             <a href="cart.php" class="position-relative me-4 my-auto">
                             <?php 
                                         $sql="SELECT * FROM `cart`";
                                         $res=mysqli_query($con,$sql);
                                         $i=0;
                                         while($row=mysqli_fetch_assoc($res))
                                         {
                                             $i++;
                                         }
                                         ?>
                                 <i class="fa fa-shopping-bag fa-2x" style="color:#81c408 ;"></i>
                                 <span
                                     class="position-absolute rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                     style="top: -5px; left: 15px; height: 20px; min-width: 20px; background-color: #ffb524;"><?php echo $i?></span>
                             
                                 </a>
                              <a href="user_info.php" class="my-auto">
                                <i class="fas fa-user fa-2x" style="color:#81c408;"></i>
                                <?php echo  $row2['name']. " ".$row2['lname'] ?>
                            </a>
                         </div>
                     </div>
                 </nav>
             </div>
         </div>


   


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">ORDERS</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

  <div class="row my-5">
    <div class="col-sm-10 offset-sm-1 text-center">
        <p class="icon-addcart"><span><i class="fa fa-check  display-1 p-5 bg-light rounded-circle" style="color: #88c8bc;"></i></span></p>
        <h2 class="mb-4">Thank you for purchasing, Your order is complete</h2>
        <p>
            <a href="index.html"class="btn  btn-outline-secondary">Home</a>
            <a href="men.html"class="btn  btn-outline-secondary"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
        </p>
    </div>
</div>
<h1 class="text-center m-3">Your Order Details</h1>
<table class="table w-50 m-auto">
    <thead>
        <tr>
            <th scope="col">ORDER ID</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php 
       $email = $row2['email'];

            $sql = "SELECT * FROM `chackout` WHERE `email` = '$email'";
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)) {
        ?>
        <tr class="order-row" data-order-id="<?php echo $row['orderid']; ?>">
            <td class="py-5"><h4><?php echo $row['orderid']; ?></h4></td>
            <td class="py-5">$<?php $total = $row['price'] * $row['quantity']; echo $total; ?>/-</td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<div id="order-details-container"></div>

<script>
    $(document).ready(function() {
        // Hide all order ID tables initially
        $('#order-id-table').hide();

        $('.order-row').click(function() {
            var orderId = $(this).data('order-id');

            // Hide all order details sections
            $('.order-details-section').hide();

            // Make AJAX request to get order details
            $.ajax({
                url: 'get_order_details.php',
                type: 'POST',
                data: { orderId: orderId },
                success: function(response) {
                    // Display order details
                    $('#order-details-container').html(response).show();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

 <!-- Footer Start -->
 <div class="container-fluid text-white-50 footer pt-5 mt-5 w-100" style="background-color: #45595b !important;">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class=" mb-0" style="color: #81c408;">Fruitables</h1>
                            <p class=" mb-0" style="color: #FFB524;">Fresh products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                                placeholder="Your Email">
                            <button type="submit"
                                class="btn  border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white aa"
                                style="top: 0; right: 0; background-color: #81c408;">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-warning me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-warning me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-warning me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-warning btn-md-square rounded-circle" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-warning py-2 px-4 rounded-pill " style="color:#FFB524;">Read
                            More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="">About Us</a>
                        <a class="btn-link" href="">Contact Us</a>
                        <a class="btn-link" href="">Privacy Policy</a>
                        <a class="btn-link" href="">Terms & Condition</a>
                        <a class="btn-link" href="">Return Policy</a>
                        <a class="btn-link" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="">My Account</a>
                        <a class="btn-link" href="">Shop details</a>
                        <a class="btn-link" href="">Shopping Cart</a>
                        <a class="btn-link" href="">Wishlist</a>
                        <a class="btn-link" href="">Order History</a>
                        <a class="btn-link" href="">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Fruitables</a>,
                        All right
                        reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Designed and Distributed By UDAY LASHAKRI
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright End -->
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    "use strict";
  
    /**
     * Preloader
     */
    const preloader = document.querySelector('#preloader');
    if (preloader) {
      window.addEventListener('load', () => {
        setTimeout(() => {
          preloader.classList.add('loaded');
        }, 1000);
        setTimeout(() => {
          preloader.remove();
        }, 2000);
      });
    }
  });
    
  </script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
     $(document).ready(function(){
        $("#se").click(function(){
            $(".se").slideToggle(2000);
        });
     });
</script>
<script type="text/javascript">
  $(document).ready(function(){
   

     $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "live.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
  });
</script>
</html>