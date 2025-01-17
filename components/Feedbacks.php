<!doctype html>
<html>

<head>
    <title>
        Home</title>
    <link rel="stylesheet" href="FeedbackStyle/bootstrap.css">
    <link rel="stylesheet" href="../css/Feedbacks.css">
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-repeat: no-repeat;
        background-image: url('../images/loging3.jpg');
        background-attachment: fixed;
        padding: 0;
    }

    #form {
        margin-top: 0%;
        width: 80%;
    }

    #btn {
        background-color: #233C7B;
        text-shadow: 0 0 3px #000000;
        font-size: 24px;
        margin: 0;
    }

    .btn {
        width: 150px;
        background: #233C7B;
        color: #000;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
        margin-left: 100px;
        margin-top: 25px;
        text-decoration: none;
        color: #fff;
    }

    .title-icon {
        text-align: center;
        margin-bottom: 0px;
    }

    #form {
        margin-left: 10%;
    }

    .btn-us-home button {
        border: none;
    }

    .btn-us-home {
        position: absolute;
        display: block;
        top: 0%;
        left: 10%;
    }

    .btn-us-home h3 {
        font-size: 18px;
    }
    </style>
</head>

<body>
    <?php
require_once('connection.php');
session_start();
$email = $_SESSION['email'];

if(isset($_POST['submit'])){
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	$sql="insert into  feedback (EMAIL,COMMENT) values('$email','$comment')";
	$result = mysqli_query($con,$sql);
	echo '<script>alert("Feedback Sent Successfully!!THANK YOU!!")</script>';
	header("Location: ../components/cardetails.php");	
}

?>
    <!-- <button class="btn"> <a href="../components/cardetails.php">Go To Home</a></button> -->
    <div class="btn-us-home">
        <h3 class="title-icon">Home</h3> <!-- Add Title Home here -->
        <button class="back-btn-bb"><a href="./cardetails.php"><img src="../images/icon-home.png.png" width="50vw"
                    alt=""></a></button>
    </div>
    <br><br><br><br><br><br><br>
    <div id="form">

        <div class="col-md-12" id="mainform">
            <div class="col-sm-6">
                <h2 class="contact-us" style="font-size:72px; color:#000;"><strong
                        style="font-size:5cm; color:#233C7B;">F</strong>eedback.</h2>
            </div>
            <div class="col-sm-6">
                <form method="POST">
                    <label>
                        <h4>Name:</h4>
                    </label><input type="text" name="name" size="20" class=" form-control" placeholder="User name"
                        required />
                    <label>
                        <h4>Email:</h4>
                    </label> <input type="email" name="email" size="20" class=" form-control" placeholder="User Email"
                        required value="<?php echo $email; ?>" disabled />
                    <h4>Comments:</h4><textarea class="form-control" name="comment" rows="6" placeholder="Message"
                        required></textarea>
                    <br>
                    <input type="submit" class="btn btn-info" id="btn" value="SUBMIT" name="submit">
                    <form>
            </div>
        </div>
    </div>
</body>

</html>