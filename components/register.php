<!DOCTYPE html>
<html lang="en">

<head>
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="../css/register.css">

</head>

<body>

    <?php

    require_once('connection.php');
    if(isset($_POST['regs']))
    {
        $fname=mysqli_real_escape_string($con,$_POST['fname']);
        $lname=mysqli_real_escape_string($con,$_POST['lname']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $lic=mysqli_real_escape_string($con,$_POST['lic']);
        $ph=mysqli_real_escape_string($con,$_POST['ph']);

        $pass=mysqli_real_escape_string($con,$_POST['pass']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
        $gender=mysqli_real_escape_string($con,$_POST['gender']);
        $Pass=md5($pass);
        if(empty($fname)|| empty($lname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass) || empty($gender))
        {
            echo '<script>alert("please fill the place")</script>';
        }
        else{
            if($pass==$cpass){
            $sql2="SELECT *from users where EMAIL='$email'";
            $res=mysqli_query($con,$sql2);
            if(mysqli_num_rows($res)>0){
                echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
                echo '<script> window.location.href = "index.php";</script>';

            }
            else{
            $sql="insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
            $result = mysqli_query($con,$sql);

            if($result){
                echo '<script>alert("Registration Successful Press ok to login")</script>';
                echo '<script> window.location.href = "../index.php";</script>';       
            }
            else{
                echo '<script>alert("please check the connection")</script>';
            }

            }

            }
            else{
                echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
                echo '<script> window.location.href = "register.php";</script>';
            }
        }
    }


    ?>

    <div class="btn-btn-home">
        <h3 class="btn-ic-ti">Home</h3>
        <button class="back-btn-bb"><a href="../index.php"><img src="../images/icon-home.png" width="50vw"
                    alt=""></a></button>
    </div>
    <div class="header-container">
        <h1 id="fam">JOIN OUR FAMILY OF CARS!</h1>
    </div>
    <div class="main">
        <div class="register">
            <h2>Register Here</h2>
            <form id="register" action="register.php" method="POST">
                <div class="form-container">
                    <div class="form-left">
                        <label>First Name:</label>
                        <input type="text" name="fname" id="fname" placeholder="Enter Your First Name" required>

                        <label>Last Name:</label>
                        <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name" required>

                        <label>Email:</label>
                        <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="ex: example@ex.com" placeholder="Enter Valid Email" required>

                        <label>Your License Number:</label>
                        <input type="text" name="lic" id="text" placeholder=" Enter Your License number" required>
                    </div>
                    <div class="form-right">
                        <label>Phone Number:</label>
                        <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
                            placeholder="Enter Your Phone Number" required>

                        <label>Password:</label>
                        <input type="password" name="pass" maxlength="12" id="psw" placeholder="Enter Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required>

                        <label>Confirm Password:</label>
                        <input type="password" name="cpass" id="cpsw" placeholder="Renter the password" required>

                        <div class="gender">
                            <label>Gender:</label>
                            <div class="gen-f-m">
                                <label for="one">Male</label>
                                <input type="radio" name="gender" value="male">
                                <label for="two">Female</label>
                                <input type="radio" name="gender" value="female">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btnn" value="REGISTER" name="regs">
            </form>
        </div>
    </div>

    <div id="message">
        <h5>Password must contain the following:</h5>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }

    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    </script>
</body>

</html>