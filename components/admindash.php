<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <link rel="stylesheet" href="../css/admindash2.css">
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
$query="select *from feedback";
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
            <h1 class="header">FEEDBACKS</h1>
            <div>
                <div>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th class="text-table">FEEDBACK_ID</th>
                                <th class="text-table">EMAIL</th>
                                <th class="text-table">COMMENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                            <tr class="active-row">
                                <td><?php echo $res['FED_ID'];?></php>
                                </td>
                                <td><?php echo $res['EMAIL'];?></php>
                                </td>
                                <td><?php echo $res['COMMENT'];?></php>
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