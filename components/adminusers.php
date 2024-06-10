<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/adminusers.css"> -->
    <link rel="stylesheet" href="../css/adminusers1.css
    ">
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
$query="select *from users";
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
        <div>
            <h1 class="header">USERS</h1>
            <div>
                <div>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th class=" tableee">NAME</th>
                                <th class=" tableee">EMAIL</th>
                                <th class=" tableee">LICENSE NUMBER</th>
                                <th class=" tableee">PHONE NUMBER</th>
                                <th class=" tableee">GENDER</th>
                                <th class=" tableee">DELETE USERS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                 
                
                ?>
                            <tr class="active-row">
                                <td class="tbntt"><?php echo $res['FNAME']."  ".$res['LNAME'];?></td>
                                <td class="tbntt"><?php echo $res['EMAIL'];?></td>
                                <td class="tbntt"><?php echo $res['LIC_NUM'];?></td>
                                <td class="tbntt"><?php echo $res['PHONE_NUMBER'];?></td>
                                <td class="tbntt"><?php echo $res['GENDER'];?></td>
                                <td class="tbntt"><button type="submit" class="but" name="approve"><a
                                            href="deleteuser.php?id=<?php echo $res['EMAIL']?>">DELETE USER</a></button>
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