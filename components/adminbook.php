<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/adminbook.css"> -->
    <link rel="stylesheet" href="../css/adminbook1.css">
    <title>ADMINISTRATOR</title>
    <style>
    .lo-lo {
        width: 3.5vw;
        padding-top: 3%;
        padding-left: 50%;
    }
    </style>
</head>

<body>

    <?php

require_once('connection.php');
$query="SELECT *from booking ORDER BY BOOK_ID DESC";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>

    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <img class="lo-lo" src="../images/logo.png">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                    <li><a href="adminusers.php">USERS</a></li>
                    <li><a href="admindash.php">FEEDBACKS</a></li>

                    <li><a href="adminbook.php">BOOKING REQUEST</a></li>
                    <li> <button class="nn"><a href="../index.php">LOGOUT</a></button></li>
                </ul>
            </div>
        </div>

    </div>
    <div>
        <h1 class="header">BOOKING REQUEST</h1>
        <div>
            <div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <!-- <th class=" title-tab">CAR ID</th> -->
                            <th class=" title-tab">EMAIL</th>
                            <th class=" title-tab">BOOK PLACE</th>
                            <th class=" title-tab">BOOK DATE</th>
                            <th class=" title-tab hh">DURATION</th>
                            <!-- <th class=" title-tab">PHONE NUMBER</th> -->
                            <th class=" title-tab">DESTINATION</th>
                            <th class=" title-tab">RETURN DATE</th>
                            <th class=" title-tab">BOOKING STATUS</th>
                            <th class=" title-tab">APPROVE</th>
                            <th class=" title-tab">CAR RETURNED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                        <tr class="active-row">

                            <!-- <td class="tabl"><?php echo $res['CAR_ID'];?></php>
                            </td> -->
                            <td class="tabl"><?php echo $res['EMAIL'];?></php>
                            </td>
                            <td class="tabl"><?php echo $res['BOOK_PLACE'];?></php>
                            </td>
                            <td class="tabl"><?php echo $res['BOOK_DATE'];?></php>
                            </td>
                            <td class="tabl"><?php echo $res['DURATION'];?></php>
                            </td>
                            <!-- <td class="tabl"><?php echo $res['PHONE_NUMBER'];?></php>
                            </td> -->
                            <td class="tabl"><?php echo $res['DESTINATION'];?></php>
                            </td>
                            <td class="tabl"><?php echo $res['RETURN_DATE'];?></php>
                            </td>
                            <td class="tabl"><?php echo $res['BOOK_STATUS'];?></php>
                            </td>
                            <td class="tabl"><button type="submit" class="but" name="approve"><a
                                        href="approve.php?id=<?php echo $res['BOOK_ID']?>">APPROVE</a></button></td>
                            <td class="tabl"><button type="submit" class="but" name="approve"><a
                                        href="adminreturn.php?id=<?php echo $res['CAR_ID']?>&bookid=<?php echo $res['BOOK_ID']?>">RETURNED</a></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>