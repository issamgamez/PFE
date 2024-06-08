<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminvehicle2.css">

    <title>ADMINISTRATOR</title>
</head>

<body>
    <?php

require_once('connection.php');
$query="SELECT *from cars";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">C R W</h2>
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
        <h1 class="header"></h1>
        <button class="add"><a href="addcar.php">+ ADD CARS</a></button>
        <div class="tbl-cont">
            <div class="btn-con-con">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>CAR ID</th>
                            <th>CAR NAME</th>
                            <th>FUEL TYPE</th>
                            <th>CAPACITY</th>
                            <th>PRICE</th>
                            <th>AVAILABLE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                        <tr class="active-row">

                            <td><?php echo $res['CAR_ID'];?></php>
                            </td>
                            <td><?php echo $res['CAR_NAME'];?></php>
                            </td>
                            <td><?php echo $res['FUEL_TYPE'];?></php>
                            </td>
                            <td><?php echo $res['CAPACITY'];?></php>
                            </td>
                            <td><?php echo $res['PRICE'];?></php>
                            </td>
                            <td><?php  
                    if($res['AVAILABLE']=='Y')
                    {
                        echo 'YES';
                    }
                    else{
                        echo 'NO';
                    }
                    
                    
                    
                    
                    ?></php>
                            </td>
                            <td><button type="submit" class="but" name="approve"><a
                                        href="deletecar.php?id=<?php echo $res['CAR_ID']?>">DELETE CAR</a></button></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            </ddiv </div>
</body>

</html>