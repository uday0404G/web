<?php
    session_start();
    if($_SESSION){


        if (!isset($_SESSION['email']) || !isset($_SESSION['pass'])) {
            session_destroy();
            exit();
        }
    }else{
        header("location:index.php"); 
        
    }
    header("location:login.php");
        
  
        
    
 
?> 