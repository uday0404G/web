<?php
include "config.php";
    session_start();
    if (!isset($_SESSION['pas'])) {
        header("location: login.php");
        exit(); 
    }

    $pas = $_SESSION['pas'];
    $sql = "SELECT * FROM `user_info` WHERE `pas` = '$pas'";
    $res = mysqli_query($con, $sql);
    $row2 = mysqli_fetch_assoc($res);


    if (!$row2) {
    
        echo "User information not found";
        exit();
    }

 
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fruitables </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <link rel="stylesheet" href="css/style.css">
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
        .aaa .fruite-item:hover {
            box-shadow: 0 0 55px rgba(0, 0, 0, 0.4) !important;
        }
        .imgh
        {
            height: 250px !important;
            width: 100% !important;
            transition: 0.5s ease-in;

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
i{
    cursor: pointer;
}
        /*** service End ***/
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
                            <a href="order.php" class="nav-item nav-link">Order Details</a>

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
        <!-- Navbar End -->
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 " style="color: #ffb524;">100% Organic Foods</h4>
                        <h1 class="mb-5 display-3 " style="color: #81c408;">Organic Veggies & Fruits Foods</h1>
                        <div class="position-relative mx-auto">
    <input class="form-control border-2 w-75 py-3 px-4 rounded-pill" id="searchInput" type="search"
        placeholder="Search" style="border: 1px solid #ffb524;">
    <button class="btn border-2 py-3 px-4 position-absolute rounded-pill text-white h-100"
        style="top: 0; right: 25%; background-color: #81c408;" id="submitButton">Submit Now</button>
</div>
<div id="searchResults">
    <!-- Search results will be displayed here -->
</div>

                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="img/hero-img-1.png" class="img-fluid   rounded"
                                        style="background: #ffb524;" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/hero-img-2.jpg" class="img-fluid rounded"
                                        alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle mb-5 mx-auto"
                                style="background-color: #ffb524;">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over $300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle  mb-5 mx-auto"
                                style="background-color: #ffb524;">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle  mb-5 mx-auto"
                                style="background-color: #ffb524;">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle  mb-5 mx-auto"
                                style="background-color: #ffb524;">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->
        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 Aa rounded-pill active" data-bs-toggle="pill"
                                        href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 Aa  rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;">Vegetables</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 Aa  rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 130px;">Fruits</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 Aa  rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 130px;">Bread</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 Aa  rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                        <span class="text-dark" style="width: 130px;">DALS</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4" id='aa'>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php
                                        $sql = "SELECT *FROM `product_detail` WHERE `nameid`='vagi';";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        
                                        <div class="col-md-6 col-lg-4 col-xl-3 aaa">
                                        <a href="shop-detail.php?id=<?php echo $row['id'];?>" >
                                            <div class="rounded position-relative fruite-item" style="">
                                                <div class="fruite-img">
                                                    <img src="img/<?php echo $row['img'] ?>"
                                                        class="img-fluid w-100 rounded-top imgh" alt="">
                                                </div>
                                                <div class="text-white  px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px; background-color: #ffb524;">Fruits
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?php echo $row['name'] ?></h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                        eiusmod te incididunt</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            <?php echo "$" . $row['price'] . "/ kg" ?></p>
                                                        <a href="shop-detail.php?id=<?php echo $row['id'];?>" class="btn border  aa rounded-pill px-3 "
                                                            style="color: #81c408;"><i class="fa fa-shopping-bag me-2 "
                                                                style="color: #81c408;"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php
                                        $sql = "SELECT* FROM `product_detail` WHERE `nameid`='fruit'";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3 aaa">
                                         <a href="shop-detail.php?id=<?php echo $row['id'];?>" >
                                            <div class="rounded position-relative fruite-item" style="">
                                                <div class="fruite-img">
                                                    <img src="img/<?php echo $row['img'] ?>"
                                                        class="img-fluid w-100 rounded-top imgh" alt="">
                                                </div>
                                                <div class="text-white  px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px; background-color: #ffb524;">Fruits
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?php echo $row['name'] ?></h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                        eiusmod te incididunt</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            <?php echo "$" . $row['price'] . "/ kg" ?></p>
                                                        <a href="shop-detail.php?id=<?php echo $row['id']?>" class="btn border  aa rounded-pill px-3 "
                                                            style="color: #81c408;"><i class="fa fa-shopping-bag me-2 "
                                                                style="color: #81c408;"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php
                                        $sql = "SELECT* FROM `product_detail` WHERE `nameid`='bread'";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3 aaa">
                                         <a href="shop-detail.php?id=<?php echo $row['id'];?>" >

                                            <div class="rounded position-relative fruite-item" style="">
                                                <div class="fruite-img">
                                                    <img src="img/<?php echo $row['img'] ?>"
                                                        class="img-fluid w-100 rounded-top imgh" alt="">
                                                </div>
                                                <div class="text-white  px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px; background-color: #ffb524;">Fruits
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?php echo $row['name'] ?></h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                        eiusmod te incididunt</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            <?php echo "$" . $row['price'] . "/ kg" ?></p>
                                                        <a href="shop-detail.php?id=<?php echo $row['id']?>" class="btn border  aa rounded-pill px-3 "
                                                            style="color: #81c408;"><i class="fa fa-shopping-bag me-2 "
                                                                style="color: #81c408;"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php
                                        $sql = "SELECT* FROM `product_detail` WHERE `nameid`='dal'";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3 aaa">
                                         <a href="shop-detail.php?id=<?php echo $row['id'];?>" >
                                            <div class="rounded position-relative fruite-item" style="">
                                                <div class="fruite-img">
                                                    <img src="img/<?php echo $row['img'] ?>"
                                                        class="img-fluid w-100 rounded-top imgh" alt="">
                                                </div>
                                                <div class="text-white  px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px; background-color: #ffb524;">Fruits
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?php echo $row['name'] ?></h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                        eiusmod te incididunt</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            <?php echo "$" . $row['price'] . "/ kg" ?></p>
                                                        <a href="shop-detail.php?id=<?php echo $row['id']?>" class="btn border  aa rounded-pill px-3 "
                                                            style="color: #81c408;"><i class="fa fa-shopping-bag me-2 "
                                                                style="color: #81c408;"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item  rounded  "
                                style="background-color:#FFB524; border:1px solid #FFB524;">
                                <img src="img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content  text-center p-4 rounded"
                                        style="background-color: #81c408 !important">
                                        <h5 class="text-white">Fresh Apples</h5>
                                        <h3 class="mb-0" style="color: #45595b;">20% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item  rounded "
                                style="background-color: #45595b !important; border: 1px solid #45595b;">
                                <img src="img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Tasty Fruits</h5>
                                        <h3 class="mb-0" style="color: #45595b;">Free delivery</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item rounded "
                                style="border:1px solid #81c408 !important; background-color: #81c408;">
                                <img src="img/featur-3.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content text-center p-4 rounded"
                                        style="background-color: #ffb524 !important;">
                                        <h5 class="text-white">Exotic Vegitable</h5>
                                        <h3 class="mb-0" style="color: #45595b;">Discount 30$</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->

        <!-- Banner Section Start-->
        <div class="container-fluid banner  my-5" style="background-color: #FFB524;">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition
                                injected humour, or non-characteristic words etc.</p>
                            <a href="#"
                                class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/baner-1.png" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                                style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">50$</span>
                                    <span class="h4 text-muted mb-0">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->
        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Bestseller Products</h1>
                    <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which
                        looks reasonable.</p>
                </div>
                <div class="row g-4">
                    <?php
                    $limit=6;
                                        $sql = "SELECT* FROM `product_detail`LIMIT $limit";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/<?php echo $row['img'];?>" class="img-fluid rounded-circle w-100"
                                        alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5 " style="color: #81c408;"><?php echo $row['name'];?></a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star " style="color:#81c408;"></i>
                                        <i class="fas fa-star " style="color:#81c408;"></i>
                                        <i class="fas fa-star " style="color:#81c408;"></i>
                                        <i class="fas fa-star " style="color:#81c408;"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="shop-detail.php?id=<?php echo $row['id']?>" class="btn border  aa rounded-pill px-3 " style="color: #81c408;"><i
                                            class="fa fa-shopping-bag me-2 " style="color: #81c408;"></i> Add to
                                        cart</a>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    <?php
                    }
                    ?>
                    <?php
                      $limit=4;
                                        $sql = "SELECT* FROM `product_detail` WHERE `nameid`='dal' LIMIT $limit";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/<?php echo $row['img'];?>" class="img-fluid rounded imgh" alt="">
                            <div class="py-4">
                                <a href="#" class="h5" style="color: #81c408;"><?php echo $row['name'];?></a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star " style="color:#81c408;"></i>
                                    <i class="fas fa-star " style="color:#81c408;"></i>
                                    <i class="fas fa-star " style="color:#81c408;"></i>
                                    <i class="fas fa-star  " style="color:#81c408;"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3"><?php echo $row['price'];?></h4>
                                <a href="shop-detail.php?id=<?php echo $row['id']?>" class="btn border  aa rounded-pill px-3 " style="color: #81c408;"><i
                                        class="fa fa-shopping-bag me-2 " style="color: #81c408;"></i> Add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Bestsaler Product End -->
        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users " style="color:#FFB524;"></i>
                                <h4 style="color:#81c408;">satisfied customers</h4>
                                <h1 class="text-secondary">1963</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users " style="color:#FFB524;"></i>
                                <h4 style="color:#81c408;">quality of service</h4>
                                <h1 class="text-secondary">99%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users " style="color:#FFB524;"></i>
                                <h4 style="color:#81c408;">quality certificates</h4>
                                <h1 class="text-secondary">33</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users " style="color:#FFB524;"></i>
                                <h4 style="color:#81c408;">Available Products</h4>
                                <h1 class="text-secondary">789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        var currentPage = 1; 

        function fetchData(page) {
            $.ajax({
                url: "data.php",
                type: "POST",
                data: { page_no: page },
                success: function(data){
                    if(data.trim() != "") {
                        $("#btn").remove();
                        $("#aa").append(data);
                        currentPage++; 
                    } else {
                        $("#btn").html("Finished").prop("disabled", true);
                    }
                }
            });
        }
        
        fetchData(currentPage); 

        $(document).on("click", "#btn", function(){
            $("#btn").html("LOADING..."); 
            fetchData(currentPage); 
        });
    });
</script>

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
<script>
 $(document).ready(function () {
    // Function to handle live search
    function liveSearch(searchValue) {
        if (searchValue.trim() !== '') {
            $.ajax({
                url: 'live.php',
                type: 'POST',
                data: { search: searchValue },
                success: function (data) {
                    $('#searchResults').html(data);
                }
            });
        } else {
            $('#searchResults').empty(); // Empty search results if search value is empty
        }
    }

    // Live search on pressing Enter key
    $('#searchInput').on('keyup', function (e) {
        var searchValue = $(this).val().trim();
        if (e.which === 13) { // 13 is the Enter key code
            liveSearch(searchValue);
        } else if (searchValue === '') {
            $('#searchResults').empty(); // Clear search results when input is empty
        }
    });

    // Live search on button click
    $('#submitButton').click(function () {
        var searchValue = $('#searchInput').val().trim();
        liveSearch(searchValue);
    });
});

</script>
    </html>