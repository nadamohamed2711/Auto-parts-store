<?php
define('BASEPATH', true); //access connection script if you omit this line file will be blank
require 'db.php'; //require connection script

 if(isset($_POST['reg'])){  
        try {


  
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $email = $_POST['email'];
         $pass = $_POST['password'];

          
         //Check if username exists
         $sql = "SELECT COUNT(Email) AS num FROM Users WHERE Email =:Email";
         $stmt = $db->prepare($sql);

         $stmt->bindValue(':Email', $email);
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         if($row['num'] > 0){
             echo '<h1>already exist</h1>';
        }
        
       else{

    $stmt = $db->prepare("INSERT INTO Users (Email,Fname,Lname,Password) 
    VALUES (:em,:f,:l,:p)");

    $stmt->bindParam(':em', $email);
    $stmt->bindParam(':f', $fname);
    $stmt->bindParam(':l', $lname);
    $stmt->bindParam(':p', $pass);
    
    

   if($stmt->execute()){
    echo '<h1>done</h1>';
   
   //  echo '<script>alert("New account created.")</script>';
    //redirect to another page
   // echo '<script>window.location.replace("index.php")</script>';
     
   }else{
    echo '<h1>error</h1>';
    
     // echo '<script>alert("An error occurred")</script>';
   }
}
}catch(PDOException $e){
    $error = "Error: " . $e->getMessage();
    echo $error;    
    // echo '<script type="text/javascript">alert("'.$error.'");</script>';

}

}


if(isset($_POST['login']))
{

        $em=$_POST['em'];
        $ps=$_POST['ps'];
        //Check if username exists
        $sql1 = "SELECT COUNT(Email) AS num FROM Users WHERE Email =:Email and Password=:pass";
        $stmt1 = $db->prepare($sql1);

        $stmt1->bindValue(':Email', $em);
        $stmt1->bindValue(':pass', $ps);
        

        $stmt1->execute();
        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        if($row1['num'] > 0){
            echo '<h1>ok</h1>';
            session_start();
            $_SESSION['user']=$em;
            header('Location:AllProduct.php');

            

       }
       else
        echo "lol";



}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>seek coding</title>
    <link rel="stylesheet" href="./Css/index.css" />
</head>

<body>

    <div class="full-page">
        <div class="navbar">
            <div>
                <a href="website.html">seek coding</a>
            </div>
            <nav>
                <ul id="menuitems">
                    <li><a href="AllProduct.php">Home</a></li>
                    <li><a href="about/about.html">About Us</a></li>
                    <li><a href="services/service.html">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><button class="logbtn" onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
                </ul>
            </nav>

        </div>


        <div id="login-form" class="login-page">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" onclick='login()' class='toggle-btn'>Log In</button>
                    <button type="button" onclick='register()' class="toggle-btn">Register</button>
                </div>

                <form id="login" class="input-group-login" method="post" action="">
                    <input type="text" class="input-field" placeholder="Email Id" name="em" required>
                    <input type="password" class="input-field" placeholder="Enter password" name="ps" required>
                    <input type="checkbox" class="check-box"><span>Reminder password</span>
                    <button type="submit" class="submit-btn" Name="login">log in </button>
                </form>


                <form id="register" class="input-group-register" method="post" action="">
                    <input type="text" class="input-field" placeholder="First Name" name="fname" required>
                    <input type="text" class="input-field" placeholder="Last Name" name="lname" required>
                    <input type="email" class="input-field" placeholder="Email id" name="email" required>
                    <input type="password" class="input-field" placeholder="confirm password" name="password" required>
                    <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>
                    <button type="submit" class="submit-btn"  name="reg">Register</button>
                </form>
            </div>

        </div>

    </div>
    <script>
        var x = document.getElementById('login')
        var y = document.getElementById('register')
        var z = document.getElementById('btn')

        function register() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';
        }

        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0px';
        }
    </script>
    <script>
        var model = document.getElementById('login-form');
        window.onclick = function(event) {
            if (event.targrt == model) {
                model.style.display = "none";
            }
        }
    </script>
</body>

</html>