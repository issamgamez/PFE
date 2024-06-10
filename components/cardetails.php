<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cardetails2.css">
    <title>Car Details</title>

    <style>
    input[type=text] {
        width: 120px;
        box-sizing: border-box;
        border: 2px solid black;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding: 12px 20px 12px 20px;
        transition: width 0.4s ease-in-out;
    }

    input[type=text]:focus {
        width: 15%;
    }

    .inp-search {
        display: flex;
        justify-content: end;
        padding-top: 2%;
        padding-right: 7.3%;
    }

    .utton {
        width: 240px;
        height: 40px;
        background: #233c7b63;
        border: none;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
    }

    .language {
        font-size: 16px;
        font-family: Arial;
        font-weight: lighter;
    }

    .language a {
        font-size: 17px;
        font-family: Arial;
        font-weight: bold;
    }

    .btn-div {
        padding-top: 30%;
        padding-left: 55%;
    }


    .box-im {
        width: 17vw;
        height: 25vh;
        padding-bottom: 20%;
    }

    .car-tt {
        font-size: 22px;
    }


    .lang-pad {
        padding-top: 10%;
    }

    .lo-lo {
        width: 3.5vw;
        padding-top: 7%;
        padding-left: 50%;
    }

    .overview {
        font-family: Arial;
    }
    </style>
</head>

<body class="body">
    <?php 
    require_once('connection.php');
    session_start();
    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql = "select * from users where EMAIL='$value'";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);
    $sql2 = "select * from cars where AVAILABLE='Y'";
    $cars = mysqli_query($con, $sql2);
    ?>

    <div class="cd">
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <img class="lo-lo" src="../images/logo.png">
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="aboutus2.html">ABOUT</a></li>
                        <li><a href="contactus.html">CONTACT</a></li>
                        <li><a href="Feedbacks.php">FEEDBACK</a></li>
                        <li><button class="nn"><a href="../index.php">LOGOUT</a></button></li>
                        <li>
                            <p class="phello">HELLO! &nbsp;
                                <a id="pname">
                                    <?php echo $rows['FNAME']." ".$rows['LNAME']?>
                                </a>
                            </p>
                        </li>
                        <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <h1 class="overview">OUR CARS OVERVIEW</h1>
                <div class="inp-search">
                    <input type="text" id="searchCar" placeholder="search car" onkeyup="filterCars()">
                </div>
                <div class="bbbox-coon">
                    <ul class="de" id="carList">
                        <?php while ($result = mysqli_fetch_array($cars)) { ?>
                        <li class="car-item">
                            <form method="POST">
                                <div class="box-con">
                                    <div class="box">
                                        <div class="imgBx">
                                            <img class="box-im" src="../images/<?php echo $result['CAR_IMG']?>">
                                        </div>
                                        <ddiv class="content">
                                            <?php $res = $result['CAR_ID']; ?>
                                            <h1 class="car-tt"><?php echo $result['CAR_NAME']?></h1>
                                            <h2 class="language lang-pad">Fuel Type :
                                                <a><?php echo $result['FUEL_TYPE']?></a>
                                            </h2>
                                            <h2 class="language">Capacity :
                                                <a><?php echo $result['CAPACITY']?></a>
                                            </h2>
                                            <h2 class="language">Rent Per Day : <a><?php echo $result['PRICE']?>
                                                    DH </a></h2>
                                            <div class="btn-div">
                                                <button type="submit" name="booknow" class="utton"
                                                    style="margin-top: 5px;">
                                                    <a href="booking.php?id=<?php echo $res;?>">book</a>
                                                </button>
                                            </div>
                                        </ddiv>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
    function filterCars() {
        const searchInput = document.getElementById('searchCar').value.toLowerCase();
        const carItems = document.querySelectorAll('.car-item');

        carItems.forEach(item => {
            const carName = item.querySelector('.car-tt').textContent.toLowerCase();
            if (carName.includes(searchInput)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }
    </script>
</body>

</html>