<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bookinstatus1.css">

    <title>BOOKING STATUS</title>
</head>

<body>

    <?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql="select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    if($rows==null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    }
    else{
    $sql2="select * from users where EMAIL='$email'";
    $name2 = mysqli_query($con,$sql2);
    $rows2=mysqli_fetch_assoc($name2);
    $car_id=$rows['CAR_ID'];
    $sql3="select * from cars where CAR_ID='$car_id'";
    $name3 = mysqli_query($con,$sql3);
    $rows3=mysqli_fetch_assoc($name3);





?>
    <div class="div-conta">
        <ul class="li-conta">
            <li>
                <div class="btn-us-home">
                    <h3 class="title-icon">Home</h3> <!-- Add Title Home here -->
                    <button class="back-btn-bb">
                        <a href="../components/cardetails.php">
                            <img src="../images/icon-home.png.png" width="50vw" alt="">
                        </a>
                    </button>
                </div>
            </li>
            <li class="name">HELLO! <?php echo $rows2['LNAME']." ".$rows2['FNAME']?></li>
        </ul>
    </div>
    <div class="box">
        <div class="content">
            <div class="item">
                <img src="../images/luxurycars.png" width="47vw">
                <label class="chara">CAR NAME:</label>
                <label class="nm-la"><?php echo $rows3['CAR_NAME']?></label>
            </div>
            <div class="item">
                <img src=" ../images/calander.png" width="47vw">
                <label class="chara">NM OF DAYS:</label>
                <label class="nm-la"><?php echo $rows['DURATION']?></label>
            </div>
            <div class="item">
                <img src="../images/status.png" width="47vw">
                <label class="chara">BOOKING STATUS:</label>
                <label class="nm-la"><?php echo $rows['BOOK_STATUS']?></label>
            </div>
        </div>
    </div>



    <?php }
?>

</body>

</html>