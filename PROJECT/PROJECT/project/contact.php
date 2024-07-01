<?php

include "config.php";
session_start();
if (!isset($_SESSION['pas'])) {
    header("location: login.php");
    exit(); // Stop further execution
}

$pas = $_SESSION['pas'];
$sql = "SELECT * FROM `user_info` WHERE `pas` = '$pas'";
$res = mysqli_query($con, $sql);
$row2 = mysqli_fetch_assoc($res);


if (!$row2) {

    echo "User information not found";
    exit();
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['insert']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $massage=$_POST['massage'];
        $sql="INSERT INTO `contact_details` (`name`,`email`,`massage`)VALUES('$name','$email','$massage')";
        $res=mysqli_query($con,$sql);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
             #preloader {
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
        </style>
    </head>

    <body>

       


      <div id="preloader">
        <div class="line"></div>
      </div>
   
        <!-- Navbar start -->
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
                             <a href="../user_info.php" class="my-auto">
                                <i class="fas fa-user fa-2x" style="color:#81c408;"></i>
                                <?php echo  $row2['name']. " ".$row2['lname'] ?>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


      


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Contact</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="" method="POST">
                                <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                <textarea name="massage" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"></textarea>
                                <input class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit" name="insert"></input>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">123 Street New York.USA</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">info@example.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

                                    <!-- footer start -->
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
                        <span class="text-light"><a href="#"><i
                                    class="fas fa-copyright text-light me-2"></i>Fruitables</a>, All right
                            reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Designed and Distributed By UDAY LASHAKRI
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

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
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>
    <script>
     $(document).ready(function(){
        $("#se").click(function(){
            $(".se").slideToggle();
        });
     });
</script>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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