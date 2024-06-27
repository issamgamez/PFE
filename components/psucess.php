<?php
    session_start();
    if(isset($_SESSION['EMAIL'])){

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            text-align: center;
            background-image: url("../images/loging3.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        h1 {
            color: #4d7f01;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }

        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
        }

        i {
            color: #4d7f01;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }

        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            display: inline-block;
            margin-top: 100px;
        }

        #print {
            width: 150px;
            height: 40px;
            background: #ff7200;
            border: none;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: black;
            cursor: pointer;
        }

        .info {
            text-align: left;
            margin-top: 20px;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            color: #404F5E;
            display: none;
        }

        .info p {
            margin: 5px 0;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const content = document.getElementById('rental-info').innerText;

            doc.text(content, 10, 10);
            doc.save("rental_confirmation.pdf");
            window.location.href="bookinstatus.php";
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('print').addEventListener('click', generatePDF);
        });
    </script>
</head>

<body>
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #dfdfdf; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>We received your rental request;<br /> we'll be in touch shortly!</p>
        <div id="rental-info" class="info" >
            <p><strong>Rental Confirmation</strong></p>
            <p> <?php if(isset($_SESSION['EMAIL'])){echo "email :". $_SESSION['EMAIL'];} ?></p>
            <p> <?php if(isset($_SESSION['FULLNAME'])){echo "full name :". $_SESSION['FULLNAME'];} ?></p>
            <p> <?php if(isset($_SESSION['CAR_NAME'])){echo "car name:". $_SESSION['CAR_NAME'];} ?></p>
            <p> <?php if(isset($_SESSION['BOOK_DATE'])){echo "booking date :". $_SESSION['BOOK_DATE'];} ?></p>
            <p> <?php if(isset($_SESSION['BOOK_PLACE'])){echo "booking place :". $_SESSION['BOOK_PLACE'];} ?></p>
            <p> <?php if(isset($_SESSION['DURATION'])){echo "duration :". $_SESSION['DURATION'];} ?></p>
            <p> <?php if(isset($_SESSION['PHONE_NUMBER'])){echo "phone number :". $_SESSION['PHONE_NUMBER'];} ?></p>
            <p> <?php if(isset($_SESSION['DESTINATION'])){echo "distination :". $_SESSION['DESTINATION'];} ?></p>
            <p> <?php if(isset($_SESSION['PRICE'])){echo "total price :". $_SESSION['PRICE']." DH";} ?></p>
            <p> <?php if(isset($_SESSION['RETURN_DATE'])){echo "return date :". $_SESSION['RETURN_DATE'];} ?></p>
            <div>
                <img src="../images/<?php echo $_SESSION['CAR_IMG'] ?>" alt="">
            </div>
        </div>
        <button id="print">Print Form</button>
    </div>
</body>

</html>
<?php

    }
    else{
        header('location:./cardetails.php');
    }
?>