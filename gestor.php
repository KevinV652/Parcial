<?php
function numeros_amigos($numero) {
    $suma_resultado = 0;
    for ($i = 1; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $suma_resultado += $i;
        }
    }
    return $suma_resultado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_1 = intval($_POST["numero_1"]);
    $numero_2 = intval($_POST["numero_2"]);

    $suma_div_1 = numeros_amigos($numero_1);
    $suma_div_2 = numeros_amigos($numero_2);

    if ($numero_1 == $suma_div_2 && $numero_2 == $suma_div_1) {
        echo "Los números $numero_1 y $numero_2 sí son números amigos.";
    } else {
        echo "Los números $numero_1 y $numero_2 no son números amigos.";
    }
}

?>
