<!DOCTYPE html>
<html>
<head>
    <title>Cifrado de Entero</title>
</head>
<body>
    <h1>Cifrado de Entero</h1>
    <p>Ingrese un entero de cuatro dígitos y haga clic en el botón para cifrarlo:</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="enteroOriginal" maxlength="4">
        <input type="submit" value="Cifrar">
    </form>

    <?php
    function cifrarEntero($entero) {
        if (preg_match('/^\d{4}$/', $entero)) {
            $entero = (int)$entero;
            $digito1 = (int)($entero / 1000);
            $digito2 = (int)(($entero % 1000) / 100);
            $digito3 = (int)(($entero % 100) / 10);
            $digito4 = $entero % 10;
            $digito1 = ($digito1 + 7) % 10;
            $digito2 = ($digito2 + 7) % 10;
            $digito3 = ($digito3 + 7) % 10;
            $digito4 = ($digito4 + 7) % 10;
            $enteroCifrado = $digito3 * 1000 + $digito4 * 100 + $digito1 * 10 + $digito2;
            return $enteroCifrado;
        } else {
            return false;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteroOriginal = $_POST["enteroOriginal"];
        $enteroCifrado = cifrarEntero($enteroOriginal);
        
        if ($enteroCifrado !== false) {
            echo "Entero cifrado: $enteroCifrado";
        } else {
            echo "Por favor, ingrese un entero de cuatro dígitos válido.";
        }
    }
    ?>
</body>
</html>
