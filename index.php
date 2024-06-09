<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAR RENTAL</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <?php
require_once('components/connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        if(empty($email) || empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: components/cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }

            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }

?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"><img src="./images/logo.png" alt=""></h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="components/aboutus.html">ABOUT</a></li>
                    <li><a href="components/services.php">SERVICES</a></li>

                    <li><a href="components/contactus.html">CONTACT</a></li>
                    <li> <button class="adminbtn"><a href="components/adminlogin.php">ADMIN LOGIN</a></button></li>
                </ul>
            </div>


        </div>
        <div class="content">
            <h1>Car Rental <br><span>WORLDWIDE</span></h1>
            <p class="par">Live the life of Luxury.<br>
                Just rent a car of your wish from our vast collection.<br>Enjoy every moment with your family<br>
                Join us to make this family vast. </p>
            <button class="cn"><a href="components/register.php">JOIN US</a></button>
            <div class="form">
                <h2>Login Here</h2>
                <form method="POST">
                    <input class="inp-ut" type="email" name="email" placeholder="Enter Email Here">
                    <input class="inp-ut" type="password" name="pass" placeholder="Enter Password Here">
                    <input class="btnn login-btn" type="submit" value="Login" name="login">
                </form>
                <p class="link">Don't have an account?<br>
                    <a href="components/register.php">Sign up</a> here</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>