<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seccion 6</title>
</head>
<body>
    <h1>Seccion 6</h1>

    <form method="post" action="gestor.php">
    <label for="numero_1">Número 1</label>
    <input required class="form-input" id="numero_1" name="numero_1" type="number" placeholder="Número 1">

    <label for="numero_2">Número 2</label>
    <input required class="form-input" id="numero_2" name="numero_2" type="number" placeholder="Número 2">

    <button type="submit">Enviar</button>
    </form>

    <form action="index.php">
        <button type="submit">
        <h2>Volver</h2>
    </button>
    </form>
</body>
</html>

