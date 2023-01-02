<?php
    require_once("./stripe/init.php");
    if (is_null($_GET["token"])){
        $token = openssl_random_pseudo_bytes(4);
        $token = bin2hex($token);
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "?token=" . $token);
        exit();
    } else {
        $token = $_GET["token"];
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
        <div id="first-page">
            <div id="chose-anonymous" class="section">
                <p>Voulez-vous donner anonymement ?</p>
                <div>
                    <input id="anon-no" type="radio" value="Non" name="anon-btn" checked>
                    <label for="anon-no" class="btn-label">Non</label>
                    <input type="radio" value="Oui" id="anon-yes" name="anon-btn">
                    <label for="anon-yes" class="btn-label">Oui</label>
                </div>
            </div>
            <div id="personal-info" class="section">
                <p>Informations personnelles</p>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <select id="civilite">
                                    <option value="M">M</option>
                                    <option value="Mme">Mme</option>
                                    <option value="non-binary">Je préfère ne pas rensigner</option>
                                </select>
                            </td>
                            <td>
                                <input type="email" placeholder="Votre adresse mail" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="NOM" name="surname">
                            </td>
                            <td>
                                <input type="number" placeholder="Numéro de téléphone" name="phone" pattern="/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/gm">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Prénom" name="first-name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" placeholder="Code postal" name="postal-code">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Ville de résidence" name="city">
                            </td>
                        </tr>
                    </tbody>
                </table>
                

            </div>
            
        </div>
    </form>
    

    
</body>
</html>