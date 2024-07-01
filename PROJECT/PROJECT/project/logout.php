 <?php
    session_start();
    if($_SESSION){
        if (!isset($_SESSION['email']) || !isset($_SESSION['pas'])) {
        }
    }
    header("location:login.php");
    session_destroy();
 
?> 