<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/addcar1.css">
    <title>ADMINISTRATOR</title>
</head>

<body>

    <div class="main">
        <div class="btn-home">
            <h4 class="title-lo-icon">Home</h4>
            <button class="back"><a href="./adminvehicle.php"><img src="../images/icon-home.png" width="30vw"
                        alt=""></a></button>
        </div>
        <div class="register">
            <h2>Enter Details Of New Car</h2>
            <form id="register" action="upload.php" method="POST" enctype="multipart/form-data">
                <label>Car Name : </label>
                <br>
                <input type="text" name="carname" id="name" placeholder="Enter Car Name" required>
                <br><br>

                <label>Fuel Type : </label>
                <br>
                <input type="text" name="ftype" id="name" placeholder="Enter Fuel Type" required>
                <br><br>

                <label>Capacity : </label>
                <br>
                <input type="number" name="capacity" min="1" id="name" placeholder="Enter Capacity Of Car" required>
                <br><br>

                <label>Price : </label>
                <br>
                <input type="number" name="price" min="1" id="name"
                    placeholder="Enter Price Of Car for One Day(in rupees)" required>
                <br><br>

                <label>Car Image : </label>
                <br>
                <input class="im-la" type="file" name="image" required>
                <br><br>

                <input type="submit" class="btnn" value="ADD CAR" name="addcar">



                </input>

            </form>
        </div>
        </div.main>
</body>

</html>