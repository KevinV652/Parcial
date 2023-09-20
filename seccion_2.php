<?php
class CalculadoraEdades {
    private $edades;

    public function __construct($edades) {
        $this->edades = $edades;
    }

    public function calcularPromedio() {
        $edadesArray = explode(',', $this->edades);
        $edadesValidas = $this->filtrarEdadesValidas($edadesArray);

        $totalEdades = count($edadesValidas);

        if ($totalEdades > 0) {
            $sumaEdades = array_sum($edadesValidas);
            return $sumaEdades / $totalEdades;
        } else {
            return 0;
        }
    }

    public function encontrarEdadMasBaja() {
        $edadesArray = explode(',', $this->edades);
        $edadesValidas = $this->filtrarEdadesValidas($edadesArray);

        if (!empty($edadesValidas)) {
            return min($edadesValidas);
        } else {
            return 0;
        }
    }

    private function filtrarEdadesValidas($edadesArray) {
        return array_filter($edadesArray, function ($edad) {
            return is_numeric($edad) && $edad >= 18;
        });
    }

    public function contarPersonasValidas() {
        $edadesArray = explode(',', $this->edades);
        $edadesValidas = $this->filtrarEdadesValidas($edadesArray);
        return count($edadesValidas);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $edades = isset($_POST['Edades']) ? $_POST['Edades'] : '';
    $calculadora = new CalculadoraEdades($edades);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Edades (POO)</title>
</head>
<body>
    <h1>Ingrese las edades mayores de 18 años y haga clic en "Calcular" :</h1>
    <h6> (si llegas a ingresar edad menores a 18 solo se mostrara en edades ingresadas para mostrar que valor esta de mas pero esos valores menores a 18 no se van a tener en cuenta para el calculo)</h6>
    <form method="post" action="">
        <label for="Edades">Edades (separadas por comas):</label>
        <input type="text" id="Edades" name="Edades" required>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php if (isset($calculadora)): ?>
        <h2>Resultados:</h2>
        <p>Edades ingresadas: <?php echo $edades; ?></p>
        <p>Total de personas: <?php echo $calculadora->contarPersonasValidas(); ?></p>
        <p>Promedio de las edades: <?php echo $calculadora->calcularPromedio(); ?></p>
        <p>Edad más baja: <?php echo $calculadora->encontrarEdadMasBaja(); ?></p>
    <?php endif; ?>
</body>
</html>
