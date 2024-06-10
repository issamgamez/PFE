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

    #back {
        width: 150px;
        height: 40px;
        background: #ff7200;
        border: none;
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    #back a {
        text-decoration: none;
        color: black;
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
    function generatePDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.text("rental confirmation", 10, 10);

        doc.save("rental_confirmation.pdf");
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('back').addEventListener('click', generatePDF);
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
        <button id="back"><a href="cardetails.php">Search Cars</a></button>
    </div>
</body>

</html>