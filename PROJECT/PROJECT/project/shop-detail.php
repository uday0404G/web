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
        $name=$_POST['image'];
        $email=$_POST['name'];
        $massage=$_POST['price'];
        $qu=$_POST['qu'];

      
      
        
                                         
        $sql="INSERT INTO `cart` (`image`,`name`,`price`,`quantity`)VALUES('$name','$email','$massage','$qu')";
        $res=mysqli_query($con,$sql);

        if($res)
        {
            header('location:pagination/shop.php');
        }
    }
  
}
$qu = 1;

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


    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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


   


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <?php
                            $id=$_REQUEST['id'];
                            $sql="SELECT * FROM `product_detail` WHERE `id`='$id'";
                            $res=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {

                            
                            ?>
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <form action="" method="POST">
                                    <input type="hidden" name="image" value="<?php echo $row['img']?>">
                                    <input type="hidden" name="name" value="<?php echo $row['name']?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price']?>">
                                    <input type="hidden" name="qu" value="<?php echo $qu?>">
                                   

                                    <a href="#">
                                        <img src="img/<?php echo $row['img']?>"  class="img-fluid rounded"
                                            alt="Image">
                                    </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3"><?php echo $row['name']?></h4>
                            <p class="mb-3">Category: <?php echo ucfirst($row['nameid'])?></p>
                            <h5 class="fw-bold mb-3" >$<?php echo $row['price']?></h5>
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected
                                humour, or non-characteristic words etc.</p>
                            <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder;
                                chain pickerel hatchetfish, pencilfish snailfish</p>
                                <div class="input-group quantity mb-5" style="width: 100px;">
    <div class="input-group-btn">
        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="decrementQuantity()">
            <i class="fa fa-minus"></i>
        </button>
    </div>
    <input id="quantityInput" type="text" class="form-control form-control-sm text-center border-0" name="qu" value="<?php echo $qu ?>">
    <div class="input-group-btn">
        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="incrementQuantity()">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</div>

<script>
    function incrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var newValue = parseInt(quantityInput.value) + 1;
        quantityInput.value = newValue;
    }

    function decrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var newValue = parseInt(quantityInput.value) - 1;
        if (newValue >= 1) {
            quantityInput.value = newValue;
        }
    }
</script>

                        </div>
                        <input type="submit" href="?id=<?php echo $row['id']?>" name="insert"
                            class="btn border  aa rounded-pill px-3 " style="color: #81c408;" value="Add to cart">
                    </div>
                    </form>

                    <?php
                             }
                            ?>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>The generated Lorem Ipsum is therefore always free from repetition injected humour,
                                    or non-characteristic words etc.
                                    Susp endisse ultricies nisi vel quam suscipit </p>
                                <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish
                                    filefish Antarctic
                                    icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray
                                    sweeper.</p>
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div
                                                class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">1 kg</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Country of Origin</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Agro Farm</p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Quality</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Organic</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Сheck</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Healthy</p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Min Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">250 Kg</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
                                    sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                        placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                        Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <h4 class="mb-4">Featured products</h4>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="img/featur-1.jpg" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="img/featur-2.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="img/featur-3.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/vegetable-item-4.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/vegetable-item-5.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/vegetable-item-6.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div>
                                <h6 class="mb-2">Big Banana</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#"
                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                More</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- Single Product End -->


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
        }, 1000);
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