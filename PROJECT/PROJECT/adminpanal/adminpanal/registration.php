<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST['insert'])) {
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $position = $_POST['position'];
        $gen = $_POST['gen'];
        $pas = $_POST['pas'];
        
        if(!empty($name) &&!empty($lname)&& !empty($email) && !empty($phone) && !empty($position) && !empty($gen) && !empty($pas)) {
            $sql = "INSERT INTO `admin_info`(`name`,`last_name`, `email`, `phone`, `Position`, `gen`, `pass`) VALUES ('$name', '$lname','$email', '$phone', '$position', '$gen', '$pas')";
            $res = mysqli_query($con, $sql);
            
            
            if($res) {
                header("location: login.php");
                exit();
            } else {
                echo "<script>alert('Error: ".mysqli_error($con)."')</script>";
            }
        } else {
            
            echo "<script>alert('Please fill in all required fields')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
   
        * {
    margin: 0;
    padding: 0;

    font-family: "poppins", sans-serif;
}

body{
    background-color: #000;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url("immg/bg.jpg") no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
/* color: #fff; */
}

.box{
    width: 400px;
    height: auto;
    border: 2px solid  #625d5d;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    backdrop-filter: blur(15px);
    background: transparent;
}

h2{
    font-size: 2em;
    color: #fff;
    text-align: center;
}

.inputbox{
    position: relative;
    margin: 20px 0;
    width: 300px;
    border-bottom: 2px solid#fff;
}

.inputbox label{
    position: absolute ;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #000;
    font-size: 1em ;
    pointer-events: none;
    transition: 0.5s;
}

input:focus ~ label{
    top: -3px;
}

input:focus ~ label{
    top: -3px;
}

.inputbox input{
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: 0 35px 0 5px;
    color: #000;
}
.inputbox select{
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: 0 35px 0 5px;
    color: #000;
   
}

.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    top: 20px;
}


#btn{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background-color: #e6e2e2;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1.3em;
    font-weight: 700;
    animation: b 5s ease 2s infinite alternate both;
}
@keyframes b {
    0%{
        bottom: 0;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }
    100%{
        bottom: 50px;
        box-shadow: 0 50px 50px rgba(0, 0, 0, 0.1);

    }
}

.forget{
    display: flex;
    justify-content: space-between;
    margin: 10px 0 15px;
    font-size: 0.9em;
    color: #fff;
}

.forget label:nth-child(2){
    order: 1;
}

.forget label{
    display: flex;
    align-items: center;
}

.forget label input[ type="checkbox"]{
    margin-right: 6px
}

.forget label a {
    color: #fff;
    text-decoration: none;
}

.forget label a:hover{
    text-decoration: underline;
}

.register {
    font-size: 0.9em;
    color: #fff;
    text-align: center;
    margin: 20px 0 15px;
}

.register p a{
    text-decoration: none;
    color: #fff;
    font-weight: 800;
}

.register p a:hover{
    text-decoration: underline;
}


</style>
</head>
<body>
    
    <div class="box">

        <form action="" method="POST">

            <h2>Registration Here</h2>
            <div class="inputbox">
                
                <input type="text" name="name" required id="n">
                <label for="">Enter Your Name</label>
            </div>
            <div class="inputbox">
                
                <input type="text" name="lname" required id="n">
                <label for="">Enter Your SurName</label>
            </div>
            <div class="inputbox"> 
                <input type="email" name="email" required id="e">
                <label for="">Email:</label>
            </div>
            <div class="inputbox"> 
                <input type="tel" minlength="10" name="phone" required id="e">
                <label for="">Phone Number:</label>
            </div>
            <div class="inputbox"> 
               <select name="position" id="">
                <option value="">Position</option>
                <option value="owner">owner</option>
                <option value="Manager">Manager</option>
                <option value="Superwiser">Superwiser</option>
               </select>
            </div>
                <label for="">Gender:</label>
                <input type="radio" name="gen" value="Male" required  id="d">Male
                <input type="radio" name="gen" value="FeMale" required  id="d">FeMale
            
            <div class="inputbox">
                <input type="password" name="" required  id="d">
                <label for="">Password:</label>
            </div>
            <div class="inputbox">
                <input type="password" name="pas" required  id="d">
                <label for="">Re Enter Password:</label>
            </div>
         
            <input type="submit" name="insert" value="Register" id="btn"> 
            

            <div class="register">
                <p>you have an account ? <a href="login.php" id="re">Login</a></p>
            </div>
        </form>
    </div>

    
</body>

</html>