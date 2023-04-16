<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // ⬇️ This is debugging code that can be useful if you need to test this PHP without
    // going through the amount selection page
    // if (!isset($_SESSION['amount'])){
    //     $_SESSION['amount'] = '5';
    // }

    // Also, if you want to bypass the payment but still arrive in the DB, please add `or true`
    // to the following (uncommented) line. It will become :
    // if (isset($_SESSION['submit']) or true == true) {
    //     ...
    // }

    if (isset($_SESSION['submit'])) {
        if (isset($_GET['redirect_status'])) {
            if ($_GET['redirect_status'] == "succeeded") {
                $success = true;
                
                $isCard = '1';
                $isDonSimple = '1';
                
                if ($_SESSION['isAnonymous'] == false && $_SESSION['isCompany'] == false) {

                    $lname = $_SESSION['lname'];
                    $fname = $_SESSION['fname'];
                    $postal = $_SESSION['postal'];
                    $city = $_SESSION['city'];
                    $email = $_SESSION['email'];
                    $phone = $_SESSION['phone'];
                    $mailingAddress = $_SESSION['address'];
                    $addressComplement = $_SESSION['addressComplement'];
                    $amount_donated = $_SESSION['amount_donated'];

                    $stripeFee = round((0.25 + $totalAmount * 0.015) * 100) / 100;
                    $real_amount = $amount_donated - $stripeFee;

                    $sql = "INSERT INTO donations(lname, fname, postal, city, email, phone, mailingAddress, addressComplement, amount_donated, real_amount, isCard, isDonSimple) VALUES(
                        '$lname',
                        '$fname',
                        '$postal',
                        '$city',
                        '$email',
                        '$phone',
                        '$mailingAddress',
                        '$addressComplement',
                        '$amount_donated',
                        '$real_amount',
                        '$isCard',
                        '$isDonSimple'
                    )";

                } elseif ($_SESSION['isCompany'] == true && $_SESSION['isAnonymous'] == false) {
                    $companyName = $_SESSION['companyName'];
                    $companySIREN = $_SESSION['companySIREN'];
                    $companySIRET = $_SESSION['companySIRET'];
                    $companyContactAddress = $_SESSION['companyContactAddress'];
                    $companyAddress = $_SESSION['companyAddress'];
                    $companyAddressComplement = $_SESSION['companyAddressComplement'];
                    $companyPostal = $_SESSION['companyPostal'];
                    $companyCity = $_SESSION['companyCity'];

                    $sql = "INSERT INTO donations(companyName, companySIREN, companySIRET, companyContactAddress, companyAddress, companyAddressComplement, companyPostal, companyCity) VALUES(
                        '$companyName',
                        '$companySIREN',
                        '$companySIRET',
                        '$companyContactAddress',
                        '$companyAddress',
                        '$companyAddressComplement',
                        '$companyPostal',
                        '$companyCity'
                    )";

                } else {
                    $isAnonymous = $_SESSION['isAnonymous'];
                    $amount_donated = $_SESSION['amount_donated'];
                    $stripeFee = (0.25 + $amount_donated * 0.015) * 100 / 100;
                    $real_amount = ($amount_donated - $stripeFee) * 100 / 100;
                    $sql = "INSERT INTO donations(amount_donated, real_amount, isAnonymous, isCard) VALUES ('$amount_donated', '$real_amount', '$isAnonymous', '$isCard')";
                }

                require('../config/db_connect.php');

                if (!mysqli_query($conn, $sql)) {
                    echo "Query error: " .mysqli_error($conn);
                }
            } else {
                header('Location: ../');
            }
        } else {
            header('Location: ../');
        }
    } else {
        header('Location: ../');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="../img/LRDE-logo.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Thank you!</title>
</head>
<body>

    <?php
        $prefix = "../";
        require('../modules/nav.php')
    ?>

    <main>

        <div>
            <?php
                $currentPage = "success";
                include('../modules/progress.php');

                if ($success) {                
                    session_destroy();
                }
            ?>

            <h2>Merci pour votre participation!</h2>
        </div>
        <div class="return"><a href="https://ronde-de-l-espoir.fr" class="button">Retour à l'accueil</a></div>
        
    </main>
    
</body>
</html>
