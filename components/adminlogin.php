<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">

    <title>ADMIN LOGIN</title>
    <style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-hhh {
        display: flex;
        justify-content: space-between;
        width: 70vw;
        height: 70vh;
        /* For visual reference */
    }

    .container-hhh>div {
        width: 45%;
        /* Adjust width as needed */
        height: 100%;
        /* Adjust height as needed */
        /* For visual reference */
    }
    </style>

</head>

<body>



    <?php
    require_once('connection.php');
    if(isset($_POST['adlog'])){
        $id=$_POST['adid'];
        $pass=$_POST['adpass'];
        
        
        if(empty($id)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select * from admin where ADMIN_ID='$id'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['ADMIN_PASSWORD'];
                if($pass  == $db_password)
                {
                    echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
                    header("location: admindash.php");
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }

           }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }

?>


    <div class="container-hhh">
        <div class="btn-home">
            <h4 class="title-lo-icon">Home</h4>
            <button class="back"><a href="../index.php"><img src="../images/icon-home.png" width="30vw"
                        alt=""></a></button>
        </div>
        <div class="container-logo">

            <div class="icon-login">
                <img src="../images/icon_login.png" width="400vw" alt="">
            </div>
        </div>
        <div class="container-form">
            <div class="ooo">
                <h1>HELLO ADMIN!</h1>
                <div class="hhhhhh">
                    <div class="hhhh-hh">
                        <form class="form" method="POST">
                            <h2 class="hhh-title">Login as a Admin User</h2>
                            <input class="h" type="text" name="adid" placeholder="Enter admin user id">
                            <input class="h" type="password" name="adpass" placeholder="Enter admin password">
                            <input type="submit" class="btnn" value="LOGIN" name="adlog">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>