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

  
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['insert'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $date =  date('Y-m-d');
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postcode = $_POST['postcode'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $onote = $_POST['text'];
       
    
       
        if (
            !empty($firstname) && !empty($lastname) && !empty($date) && !empty($address) &&
            !empty($city) && !empty($country) && !empty($postcode) && !empty($mobile) &&
            !empty($email) && !empty($onote) 
        ) {
          
            mysqli_begin_transaction($con);
    
          
            $success = true;
    
          
            $sql = "SELECT * FROM `cart`";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $img = $row['image'];
                $pr_name = $row['name'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $subtotal = $row['price'] * $row['quantity'];
                $orderid = rand(1000000, 100000000);
    
                $insert_query = "INSERT INTO `chackout`(`first_name`, `last_name`, `date`, `address`, `city`, 
                                `country`, `postcode`, `mobie`, `email`, `order_note`, `img`, `pr_name`, `price`, `quantity`, `subtotal`, `orderid`) 
                                VALUES ('$firstname', '$lastname', '$date', '$address', '$city', '$country', '$postcode', 
                                '$mobile', '$email', '$onote', '$img', '$pr_name', '$price', '$quantity', '$subtotal', '$orderid')";
    
                $insert_result = mysqli_query($con, $insert_query);
    
                if (!$insert_result) {
                    $success = false;
                    break; 
                }
            }
    
        
            if ($success) {
             
                mysqli_commit($con);
    
              
                $clear_cart_query = "DELETE FROM `cart`";
                $clear_cart_result = mysqli_query($con, $clear_cart_query);
    
                if ($clear_cart_result) {
                  
                    header('location: order.php');

                    exit();
                } else {
                    echo "<script>alert('Failed to clear cart')</script>";
                }
            } else {
               
                mysqli_rollback($con);
                echo "<script>alert('Failed to insert data')</script>";
            } 
        } else {
            echo "<script>alert('Please fill in all fields')</script>";
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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
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
        /*** service End ***/
    </style>
</head>

<body>




<!-- <div id="preloader">
        <div class="line"></div>
      </div> -->
   
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





    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <form action="#" method="POST">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">First Name<sup>*</sup></label>
                                    <input type="text" class="form-control" name="firstname" value="<?php  echo $row2['name']?>">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Last Name<sup>*</sup></label>
                                    <input type="text" class="form-control" name="lastname" value="<?php  echo $row2['lname']?>">
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" class="form-control" name="address"
                                placeholder="House Number Street Name">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Town/City<sup>*</sup></label>
                            <input type="text" class="form-control" name="city" value="<?php  echo $row2['city']?>">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Country<sup>*</sup></label>
                            <input type="text" class="form-control" name="country" value="<?php  echo $row2['country']?>">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                            <input type="text" class="form-control" name="postcode" value="<?php  echo $row2['pincode']?>">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" class="form-control" name="mobile" value="<?php  echo $row2['phone']?>">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" class="form-control" name="email" value="<?php  echo $row2['email']?>">
                        </div>
                       
                        
                        <div class="form-item">
                        <label class="form-label my-3">Order_Note<sup>*</sup></label>
                            <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11"
                                placeholder="Oreder Notes (Optional)"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `cart`";
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <input type="hidden" value="<?php echo $row['image'] ?>" name="img">
                                        <input type="hidden" value="<?php echo $row['name'] ?>" name="pr_name">
                                        <input type="hidden" value="<?php echo $row['price'] ?>" name="price">
                                        <input type="hidden" value="<?php echo $row['quantity'] ?>" name="quantity">
                                        <input type="hidden" value="<?php echo $total1 ?>" name="subtotal">

                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="img/<?php echo $row['image'] ?>"
                                                        class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                        alt="">
                                                </div>
                                            </th>
                                            <td class="py-5"><?php echo $row['name'] ?></td>
                                            <td class="py-5">$<?php echo $row['price'] ?>/-</td>
                                            <td class="py-5"><?php echo $row['quantity'] ?></td>
                                            <td class="py-5">$<?php $totle = $row['price'] * $row['quantity'];
                                            echo $totle; ?>/-
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Subtotal</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <?php
                                                $total1 = 0;

                                                $sql = "SELECT * FROM `cart`";
                                                $res = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($res)) {

                                                    $total1 += $row['price'] * $row['quantity'];
                                                }
                                                ?>

                                                <p class='mb-0 text-dark'>$<?php echo $total1 ?>/-</p>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-4">Shipping</p>
                                        </td>
                                        <td colspan="3" class="py-5">
                                            <div class="form-check text-start">
                                               
                                            </div>
                                            <div class="form-check text-start">
                                            <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-1" name="Shipping-1" value="Shipping" checked>
                                                <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$<?php  
                                                echo  $total1?>/-
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Payments-1"
                                        name="Payments" value="Payments">
                                    <label class="form-check-label" for="Payments-1">Check Payments</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                        name="Delivery" value="Delivery" checked>
                                    <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                        name="Paypal" value="Paypal">
                                    <label class="form-check-label" for="Paypal-1">Paypal</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <input type="submit" name="insert"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary"
                                value="Place Order">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->


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



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>

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
    $(document).ready(function () {
        $("#se").click(function () {
            $(".se").slideToggle();
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {


        $("#search").on("keyup", function () {
            var search_term = $(this).val();

            $.ajax({
                url: "live.php",
                type: "POST",
                data: { search: search_term },
                success: function (data) {
                    $("#table-data").html(data);
                }
            });
        });
    });
</script>

</html>