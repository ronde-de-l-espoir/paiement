<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // ------------ Please do not initialize session variables above this line ------------- //

    // ⬇️ This some code for debugging : uncomment this and it will reset the system.
    // Then recomment this and refresh the page. Good luck !

    // session_destroy();
    // print_r($_SESSION);
    // die("Session successfully reset ! Please comment the code and refresh the page. 😊");

    // ⬇️ This has the same purpose but it more precise : it only affects the choosing part of the system.
    // Please follow the same procedure as above.

    // unset($_SESSION['isAnonymous']);
    // unset($_SESSION['isCompany']);
    // die("Choosing variables successfully reset ! Please comment the code and refresh the page. 😊");

    // ------------- End of debugging code -------------- //
    

    if (!isset($_SESSION['isAnonymous']) or !isset($_SESSION['isCompany'])) {
        header('Location: ./choosing/');
    } elseif ($_SESSION['isAnonymous'] == false and $_SESSION['isCompany'] == false and !isset($_SESSION['email'])) {
        header("Location: ../registering?type=particulier");
    } elseif ($_SESSION['isAnonymous'] == true) {
        // Nothing to do here forthe moment ! This will change when everything will be reorganised...
    } elseif ($_SESSION['isAnonymous'] == false and $_SESSION['isCompany'] == true) {
        header("Location: ../registering?type=entreprise");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <script defer src="https://js.stripe.com/v3/"></script>
    <!-- <script defer src="app.js"></script> -->
    <script defer src="checkout.js"></script>

    <link rel="shortcut icon" href="./img/LRDE-logo.png" type="image/x-icon"> <!-- To change href when merging -->

    <title>La Ronde de l'Espoir</title>
</head>
<body>

    <form id="payment-form">

        <div id="link-authentication-element"></div>
        <div id="payment-element"></div>

        <button id="submit">
            <div class="spinner hidden" id="spinner"></div>
            <span id="button-text">Donner maintenant!</span>
        </button>

        <div id="payment-message" class="hidden"></div>


    </form>

    
</body>
</html>