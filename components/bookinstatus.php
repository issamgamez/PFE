<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bookinstatus.css">

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
   <ul><li> <button  class="utton"><a href="../components/cardetails.php">Go to Home</a></button></li><li class="name">HELLO! <?php echo $rows2['LNAME']." ".$rows2['FNAME']?></li>




</ul>
    <div class="box">
         <div class="content">
             <h1>CAR NAME : <?php echo $rows3['CAR_NAME']?></h1><br>
             <h1>NO OF DAYS : <?php echo $rows['DURATION']?></h1><br>
             <h1>BOOKING STATUS : <?php echo $rows['BOOK_STATUS']?></h1><br>
             
         </div>
     </div>



<?php }
?>
    
</body>
</html>