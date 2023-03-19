<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = 'amount';

    $prefix = "../";

    if (isset($_POST['goback'])) {
        // do stuff here
        header('Location: ../informations/');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../img/LRDE-logo.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <title>Choix du Montant - Ronde de l'Espoir</title>
</head>
<body>

    <?php require('../modules/nav.php') ?>

    <main>
        <form method="POST" action="./index.php">
            <?php include('../modules/progress.php'); ?>

            <div class="column-wrapper">
                <div class="column">
                    <div class="field">
                        <p>Je donne : <input type="number" id="free-choice" placeholder="10">€</p>
                        <div class="suggestions">
                            <ul>
                                <li><button class="suggested-amount">10€</button></li>
                                <li><button class="suggested-amount">15€</button></li>
                                <li><button class="suggested-amount">30€</button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="transparency">
                        <h5>Sur mes <span class="amount-display">10</span>€ :</h5>
                        <ul>
                            <li id="assoc-display"><span class="amount-display" id="assoc-amount">9,80</span>€ partent aux <a href="#">associations</a> que nous supportons.</li>
                            <li id="stripe-display"><span class="amount-display" id="stripe-amount">0,20</span>€ partent chez <a href="#">Stripe</a>.</li>
                        </ul>
                    </div>
                    <div class="tax-deduction-display">
                        <p>Je peux aussi recevoir <span class="amount-display" id="reduction-amount">6,67</span>€ de réduction fiscale!</p>
                    </div>
                </div>
                <div class="separation"></div>
                <div class="column"></div>
            </div>

            <div class="submit-field">
                <input type="submit" name="submit" value="Suivant" class="button submit-button">
                <input type="submit" name="goback" value="Précédent" class="button border-button">
            </div>
        </form>
    </main>
    
</body>
</html>