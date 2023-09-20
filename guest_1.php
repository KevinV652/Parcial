<?php

function esCubifinito($numero) {
    $cubifinitos = array(1, 153, 370, 371, 407);
    return in_array($numero, $cubifinitos);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["analizar"])) {
    $numeroIngresado = $_POST["numero"];
    
    if (is_numeric($numeroIngresado)) {
        if (esCubifinito($numeroIngresado)) {
            echo "<p>$numeroIngresado es un número cubifinito.</p>";
        } else {
            echo "<p>$numeroIngresado no es un número cubifinito.</p>";
        }
    } else {
        echo "<p>Por favor, ingrese un número válido.</p>";
    }
}
?>
