<?php

    $servername = "ronde-de-l-espoir.fr";
    $username = "ctzs1179";
    $password = "o2switch2022";
    $dbname = "ctzs1179_donations";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>