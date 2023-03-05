<link rel="stylesheet" href="../modules/progress-style.css">
<script src="../modules/progress.js" defer></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


<!-- Exemple of progress bar for people not choosing anonymous -->
<div class="progress-bar">
    <ul id="progress-steps">

        <?php
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if ($_SESSION['isAnonymous'] == false) { ?>

            <li class="step"><span class="numeric-indicator">1</span> Informations</li>
            <li class="logic-component"><span class="material-symbols-outlined progress-child">navigate_next</span></li>
            
            <li class="step"><span class="numeric-indicator">2</span>Montant</li>
            <li class="logic-component"><span class="material-symbols-outlined progress-child">navigate_next</span></li>
            
            <li class="step"><span class="numeric-indicator">3</span>Paiement</li>
            <li class="logic-component"><span class="material-symbols-outlined progress-child">navigate_next</span></li>
            
            <li class="step"><span class="numeric-indicator">4</span>Terminé !</li>

        <?php } else { ?>

            <li class="step"><span class="numeric-indicator">1</span>Montant</li>
            <li class="logic-component"><span class="material-symbols-outlined progress-child">navigate_next</span></li>
            
            <li class="step"><span class="numeric-indicator">2</span>Paiement</li>
            <li class="logic-component"><span class="material-symbols-outlined progress-child">navigate_next</span></li>
            
            <li class="step"><span class="numeric-indicator">3</span>Terminé !</li>

        <?php } ?>
    </ul>
</div>