<?php
    require_once("./stripe/init.php")
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
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="client.js" defer></script>
    <link rel="shortcut icon" href="../../main/img/LRDE-logo.png" type="image/x-icon"> <!-- To change href when merging -->
    <title>La Ronde de l'Espoir</title>
</head>
<body>

    <nav>
        <div id="main-site-return" onclick="location.href='https://ronde-de-l-espoir.fr'">
            <p>Retour vers le site principal</p>
            <iconify-icon icon="fluent:arrow-right-48-filled" style="color: white;" rotate="180deg"></iconify-icon>        
        </div>
        <div id="title"><p>Ronde de l'Espoir</p></div>
    </nav>

    <form id="multi-step-form">
        <div>
            <div>
                <p>Voulez-vous donner anonymement ?</p>
                <input id="anon-no" type="radio" value="Non" name="anon-btn">
                <label for="anon-no">Non</label>
                <input type="radio" value="Oui" id="anon-yes" name="anon-btn">
                <label for="anon-yes">Oui</label>
            </div>
            <p>Informations personnelles</p>
            
        </div>
    </form>
    

    
</body>
</html>