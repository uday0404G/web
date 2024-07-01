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

$email = $_SESSION['pass'];
$sql = "SELECT * FROM `admin_info` WHERE `pass` = '$email'";
$res = mysqli_query($con, $sql);
$row2 = mysqli_fetch_assoc($res);
$positional = $row2['position'];
if($positional=="owner"){
    // header('location:admin_info.php');
}
else{
    echo "<script>alert('Only Owner access')</script>";
    header('location:index.php');

    exit();
}

if (!$row2) {
   
    echo "Admin information not found";
    exit();
}
if(isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];

  $sql = "DELETE FROM admin_info WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);

  header("Location: ".$_SERVER['PHP_SELF']);
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/midea.css">
    <link rel="author" href="https://plus.google.com/113101541449927918834"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
   
   </script>
   
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
<style>

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
    <a href="index.php" id="bb" class="">
 <span class="material-symbols-outlined" >
grid_view</span>
  <h3>Dashbord</h3>
        </a>

        
<a href="customer.php"  >
  <span class="material-symbols-outlined" >
 person_outline</span>
 <h3>Customer</h3>
     </a>
     <a href="admin_info.php" class="activ">
                <span class="material-symbols-outlined">
                    insights</span>
                <h3>admin info</h3>
            </a>
    <a href="order_details.php" >
   <span class="material-symbols-outlined" >
   insights</span>
   <h3>Order Details</h3>
       </a>    
  
       <a href="massage.php" >
        <span class="material-symbols-outlined" >
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
 
<a href="products.php" >
<span class="material-symbols-outlined" >
    receipt_long</span>
    <h3>Products</h3>
 </a> 
                       
 <a href="">
    <span class="material-symbols-outlined" >
   report_gmailerrorred</span>
     <h3>Reports</h3>
 </a>                     
 <a href="seting.php" >
    <span class="material-symbols-outlined" >
   settings</span>
     <h3>Settings</h3>
 </a>


 <a href="addptoduct.php" >
    <span class="material-symbols-outlined" >
   add</span>
     <h3>Add Product</h3>
 </a>

 <a href="logout.php" id="a" >
    <span class="material-symbols-outlined" >
logout</span>
     <h3>Logout</h3>
           </a>
    </div>

    </aside>
    <!-- aside end  -->

    <!-- main section start -->
<main style="height:auto;">
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
    </div></div>
     
    <div class="date animate__animated animate__backInDown">
        <input type="date" value="<?php  $currentDate = date('Y-m-d'); echo $currentDate;?>">
    </div>

    
  
<!-- start customers  -->
<div class="recentm " >
<div class="recent_order">
  <h2>Admin details</h2>
  <table style="width: 100%;"> 
      <thead>
       <tr class="animate__animated animate__slideInUp">
         <th>id</th>
         <th>Full Name</th>
         <th>email</th>
         <th>phone</th>
         <th>Position</th>
         <th>gen</th>
         <th>Remove</th>


         
         
        
       </tr>
      </thead>
       <tbody>
       <?php
    $sql = "SELECT * FROM `admin_info`";
    $res = mysqli_query($con, $sql);
 
    while ($row = mysqli_fetch_assoc($res)) {

    
?>
          <tr  class="animate__animated animate__slideInDown">
          <td class="counter"><?php echo $row['id']?></td>
            <td class="warning"><?php echo $row['name']." ".$row['last_name']?></td>
            <td class=""><?php echo $row['email']?></td>
            <td class="warning counter"><?php echo $row['phone']?></td>
            <td class="warning"><?php echo $row['position']?></td>
            <td class="warning"><?php echo $row['gen']?></td>
            <td class="warning"><a href="?delete_id=<?php echo $row['id']?>">Remove</a></td>


      
          </tr>
       <?php
    }

       ?>
       </tbody>
  </table>
  <a href="#">Show All</a>
</div>
    </main> 

</body>

<script>
  jQuery(document).ready(function( $ ) {
      $('.counter').counterUp({
          delay: 5,
          time: 2000
      });
  });
</script>


<script>
 
    $(document).ready(function(){
$("#bars").click(function(){
$("aside").toggleClass("add");
$("main").toggleClass("adm");



});

    });
</script>
<script>
    $(document).ready(function(){
$("#a").click(function(){
  
        window.location.replace("login.html")
      
});
    });
</script>
<script>
  $( ".change" ).on("click", function() {
      if( $( "main" ).hasClass( "dark" )) {
      $( "aside" ).removeClass( "dark" );
      $( ".tb" ).removeClass( "dark" );
   
      $( "main" ).removeClass( "dark" );
          $( ".change" ).text( "OFF" );
      }
       else {
 $( "aside" ).addClass( "dark" );
        // $( ".tb" ).addClass( "dark" );
$( ".right" ).css( " background-color","black" );
        
$( "aside" ).css( "box-shadow","none" );
          $( "main" ).addClass( "dark" );
          
          $( ".change" ).text( "ON" );
      }
  });
</script>


 <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
 <script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

</html>