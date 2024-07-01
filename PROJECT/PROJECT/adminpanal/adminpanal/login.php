<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST['Sign_up'])) {
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
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pas=$_POST['pas'];
        if(!empty($email)&&!empty($pas))
        {
            $sql="SELECT * FROM `admin_info` WHERE `email`='$email'AND`pass`='$pas'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
          
        }
        if($count > 0)
        {
            session_start();
            $_SESSION['email']=$row['email'];
            $_SESSION['pass']=$row['pass'];
         

            header("location:index.php");
        
        }
        else
        {
            echo "<script>alert('Your Login Detail Is Incorrect!!')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --primary-color: #4EA685;
            --secondary-color: #57B894;
            --black: #000000;
            --white: #ffffff;
            --gray: #efefef;
            --gray-2: #757575;

            --facebook-color: #4267B2;
            --google-color: #DB4437;
            --twitter-color: #1DA1F2;
            --insta-color: #E1306C;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100vh;
            overflow: hidden;
        }

        .container {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            height: 100vh;
        }

        .col {
            width: 50%;
        }

        .align-items-center {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .form-wrapper {
            width: 100%;
            max-width: 28rem;
        }

        .form {
            padding: 1rem;
            background-color:
                var(--white);
            border-radius: 1.5rem;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transform: scale(0);
            transition: .5s ease-in-out;
            transition-delay: 1s;
        }

        .input-group {
            position: relative;
            width: 100%;
            margin: 0.5rem 0;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            font-size: 1.4rem;
            color: var(--gray-2);
        }

        .input-group input,select {
            width: 100%;
            padding: 1rem 3rem;
            font-size: 1rem;
            background-color: var(--gray);
            border-radius: .5rem;
            border: 0.125rem solid var(--white);
            outline: none;
        }

        .input-group input:focus {
            border: 0.125rem solid var(--primary-color);
        }

        .form button, #btn {
            cursor: pointer;
            width: 100%;
            border: none;
            padding: .6rem 0;
            border-radius: .5rem;
            background-color:
                var(--primary-color);
            color: var(--white);
            font-size: 1.2rem;
            outline: none;
        }

        .form p {
            margin: 1rem 0;
            font-size: .7rem;
        }

        .flex-col {
            flex-direction: column;
        }

        .social-list {
            margin: 2rem 0;
            padding: 1rem;
            border-radius: 1.5rem;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transform: scale(0);
            transition: .5s ease-in-out;
            transition-delay: 1.2s;
        }

        .social-list>div {
            color: var(--white);
            margin: 0 .5rem;
            padding: .7rem;
            cursor: pointer;
            border-radius: .5rem;
            cursor: pointer;
            transform: scale(0);
            transition: .5s ease-in-out;
        }

        .social-list>div:nth-child(1) {
            transition-delay: 1.4s;
        }

        .social-list>div:nth-child(2) {
            transition-delay: 1.6s;
        }

        .social-list>div:nth-child(3) {
            transition-delay: 1.8s;
        }

        .social-list>div:nth-child(4) {
            transition-delay: 2s;
        }

        .social-list>div>i {
            font-size: 1.5rem;
            transition: .4s ease-in-out;
        }

        .social-list>div:hover i {
            transform: scale(1.5);
        }

        .facebook-bg {
            background-color: var(--facebook-color);
        }

        .google-bg {
            background-color: var(--google-color);
        }

        .twitter-bg {
            background-color: var(--twitter-color);
        }

        .insta-bg {
            background-color: var(--insta-color);
        }

        .pointer {
            cursor: pointer;
        }

        .container.sign-in .form.sign-in,
        .container.sign-in .social-list.sign-in,
        .container.sign-in .social-list.sign-in>div,
        .container.sign-up .form.sign-up,
        .container.sign-up .social-list.sign-up,
        .container.sign-up .social-list.sign-up>div {
            transform: scale(1);
        }

        .content-row {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 6;
            width: 100%;
        }

        .text {
            margin: 4rem;
            color: var(--white);
        }

        .text h2 {
            font-size: 3.5rem;
            font-weight: 800;
            margin: 2rem 0;
            transition: 1s ease-in-out;
        }

        .text p {
            font-weight: 600;
            transition: 1s ease-in-out;
            transition-delay: .2s;
        }

        .img img {
            width: 30vw;
            transition: 1s ease-in-out;
            transition-delay: .4s;
        }

        .text.sign-in h2,
        .text.sign-in p,
        .img.sign-in img {
            transform: translateX(-250%);
        }

        .text.sign-up h2,
        .text.sign-up p,
        .img.sign-up img {
            transform: translateX(250%);
        }

        .container.sign-in .text.sign-in h2,
        .container.sign-in .text.sign-in p,
        .container.sign-in .img.sign-in img,
        .container.sign-up .text.sign-up h2,
        .container.sign-up .text.sign-up p,
        .container.sign-up .img.sign-up img {
            transform: translateX(0);
        }

        /* BACKGROUND */

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            height: 100vh;
            width: 300vw;
            transform: translate(35%, 0);
            background-image: linear-gradient(-45deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            transition: 1s ease-in-out;
            z-index: 6;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-bottom-right-radius: max(50vw, 50vh);
            border-top-left-radius: max(50vw, 50vh);
        }

        .container.sign-in::before {
            transform: translate(0, 0);
            right: 50%;
        }

        .container.sign-up::before {
            transform: translate(100%, 0);
            right: 50%;
        }

        /* RESPONSIVE */

        @media only screen and (max-width: 425px) {

            .container::before,
            .container.sign-in::before,
            .container.sign-up::before {
                height: 100vh;
                border-bottom-right-radius: 0;
                border-top-left-radius: 0;
                z-index: 0;
                transform: none;
                right: 0;
            }

            /* .container.sign-in .col.sign-up {
        transform: translateY(100%);
    } */

            .container.sign-in .col.sign-in,
            .container.sign-up .col.sign-up {
                transform: translateY(0);
            }

            .content-row {
                align-items: flex-start !important;
            }

            .content-row .col {
                transform: translateY(0);
                background-color: unset;
            }

            .col {
                width: 100%;
                position: absolute;
                padding: 2rem;
                background-color: var(--white);
                border-top-left-radius: 2rem;
                border-top-right-radius: 2rem;
                transform: translateY(100%);
                transition: 1s ease-in-out;
            }

            .row {
                align-items: flex-end;
                justify-content: flex-end;
            }

            .form,
            .social-list {
                box-shadow: none;
                margin: 0;
                padding: 0;
            }

            .text {
                margin: 0;
            }

            .text p {
                display: none;
            }

            .text h2 {
                margin: .5rem;
                font-size: 2rem;
            }
        }


        /* -- YouTube Link Styles -- */

        #source-link {
            top: 60px;
        }

        #source-link>i {
            color: rgb(94, 106, 210);
        }

        #yt-link {
            top: 10px;
        }

        #yt-link>i {
            color: rgb(219, 31, 106);

        }

        .meta-link {
            align-items: center;
            backdrop-filter: blur(3px);
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: inline-flex;
            gap: 5px;
            left: 10px;
            padding: 10px 20px;
            position: fixed;
            text-decoration: none;
            transition: background-color 600ms, border-color 600ms;
            z-index: 10000;
        }

        .meta-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .meta-link>i,
        .meta-link>span {
            height: 20px;
            line-height: 20px;
        }

        .meta-link>span {
            color: white;
            font-family: "Rubik", sans-serif;
            transition: color 600ms;
        }
        .forget{
    display: flex;
    justify-content: space-between;
    margin: 10px 0 15px;
    font-size: 0.9em;
    color: #000;
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
    color: #000;
    text-decoration: none;
}

.forget label a:hover{
    text-decoration: underline;
}

    </style>
</head>

<body>
    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <form method="POST" class="form sign-up">
                        <div class="input-group">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="name" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <i class="fa-brands fa-phoenix-framework"></i>
                            <input type="text" name="lname" placeholder="Last Name">
                        </div>
                        <div class="input-group">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <i class="fa-solid fa-phone"></i>
                            <input type="tel" name="phone" placeholder="Contact Number">
                        </div>
                        <div class="input-group">
                            <i class="fa-regular fa-face-smile-beam"></i>
                            <select name="position" id="">
                                <option value="">Position</option>
                                <option value="owner">owner</option>
                                <option value="Manager">Manager</option>
                                <option value="Superwiser">Superwiser</option>
                               </select>
                        </div>
                       
                  
                        <div class="input-group">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Confirm password" name="pas" id="pas">
                        </div> 
                        <div class="forget">
                            <label for="">
                                <input type="checkbox" onclick="aa()">Show Password
                            </label>
                            <label for="">
                                Forget Password
                            </label>
                        </div>
                        <div class="input-group" >
                            
                           <p style="display: flex; width: 120px;"> <input type="radio" name="gen" value="Male" required  id="d">Male
                            <input type="radio" name="gen" value="FeMale" required  id="d">FeMale</p>                        
                        </div>
                        <input type="submit" name="Sign_up" id="btn">
                        <p>
                            <span>
                                Already have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign in here
                            </b>
                        </p>
                    </form>
                </div>

            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <form method="POST" class="form sign-in">
                        <div class="input-group">
                            <i class="fa-solid fa-user"></i>
                <input type="email" name="email" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Password" name="pas" id="pas">
                        </div>
                        <div class="forget">
                            <label for="">
                                <input type="checkbox" onclick="aa()">Show Password
                            </label>
                            <label for="">
                                Forget Password
                            </label>
                        </div>
            <input type="submit" name="login" value="Sign in" id="btn">
            
                        
                        <p>
                            <span>
                                Don't have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign up here
                            </b>
                        </p>
                    </form>
                </div>
                <div class="form-wrapper">

                </div>
            </div>
        </div>
        <div class="row content-row">
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Welcome
                    </h2>

                </div>
                <div class="img sign-in">

                </div>
            </div>
            <div class="col align-items-center flex-col">
                <div class="img sign-up">

                </div>
                <div class="text sign-up">
                    <h2>
                        Join with us
                    </h2>

                </div>
            </div>
        </div>
    </div>


   
    <script>
        let container = document.getElementById('container')

        toggle = () => {
            container.classList.toggle('sign-in')
            container.classList.toggle('sign-up')
        }

        setTimeout(() => {
            container.classList.add('sign-in')
        }, 200)
    </script>
    <script>
  
        function aa() {
      var x = document.querySelectorAll("#pas");
      x.forEach(function(element) {
        if (element.type === "password") {
          element.type = "text";
        } else {
          element.type = "password";
        }
      });
      }
      </script>
</body>

</html>