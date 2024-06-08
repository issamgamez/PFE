<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cardetails2.css">
    <title>Car Details</title>

</head>

<body class="body">

    <style>


    </style>


    <?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from cars where AVAILABLE='Y'";
    $cars= mysqli_query($con,$sql2);
        
    ?>

    </script>
    <div class="cd">
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo"><img src="./images/logo.png" alt=""></h2>
                </div>
                <div class="menu">

                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="aboutus2.html">ABOUT</a></li>

                        <li><a href="contactus.html">CONTACT</a></li>
                        <li><a href="Feedbacks.php">FEEDBACK</a></li>
                        <li><button class="nn"><a href="../index.php">LOGOUT</a></button></li>
                        <!-- <li><img src="images/profile.png" class="circle" alt="Alps"></li> -->
                        <li>
                            <p class="phello">HELLO! &nbsp;<a
                                    id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p>
                        </li>
                        <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                    </ul>
                </div>


            </div>
            <div>
                <h1 class="overview">OUR CARS OVERVIEW</h1>
                <div class="bbbox-coon">
                    <ul class="de">
                        <?php
        while($result= mysqli_fetch_array($cars))
        {
            
    ?>

                        <li>
                            <form method="POST">
                                <div class="box-con">
                                    <div class="box">
                                        <div class="imgBx">
                                            <img class="box-im" src="../images/<?php echo $result['CAR_IMG']?>">
                                        </div>
                                        <div class="content">
                                            <?php $res=$result['CAR_ID'];?>
                                            <h1 class="car-tt"><?php echo $result['CAR_NAME']?></h1>
                                            <h2>Fuel Type : <a><?php echo $result['FUEL_TYPE']?></a> </h2>
                                            <h2>CAPACITY : <a><?php echo $result['CAPACITY']?></a> </h2>
                                            <h2>Rent Per Day : <a><?php echo $result['PRICE']?> DH </a></h2>
                                            <button type="submit" name="booknow" class="utton"
                                                style="margin-top: 5px;"><a
                                                    href="booking.php?id=<?php echo $res;?>">book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <?php
        }
    
    ?>
                        <?php 
    require_once('connection.php');
        

    $value = $_SESSION['email'];
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    
        
        
    
    
    ?>





                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

</html>