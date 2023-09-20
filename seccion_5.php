
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seccion 5</title>
</head>
<body>
    <h1>Seccion 5</h1>
    <form action="index.php" method="POST">
        <label for="numero">Ingrese un número:</label>
        <input type="text" id="numero" name="numero">
        <button type="submit" name="analizar">Analizar</button>
    </form>
</body>
<body>
    <form action="index.php">
        <button type="submit">
        <h2>Volver</h2>
    </button>
    <input type="hidden" value="Volver" />
</form>
</body>

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


</html>
