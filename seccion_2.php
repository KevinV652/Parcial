<?php
class Fiesta {
    private $totalPersonas = 0;
    private $sumaEdades = 0;
    private $edadMasJoven = PHP_INT_MAX;

    public function agregarPersona($edad) {
        if ($edad == 0) {
            return; // Salir del método si se ingresa 0
        }

        if ($edad < 18) {
            echo "Lo siento, no se permite el ingreso de menores de edad." . PHP_EOL;
            return; // Ignorar edades menores de 18
        }

        $this->totalPersonas++;
        $this->sumaEdades += $edad;

        if ($edad < $this->edadMasJoven) {
            $this->edadMasJoven = $edad;
        }
    }

    public function calcularPromedioEdades() {
        if ($this->totalPersonas > 0) {
            return $this->sumaEdades / $this->totalPersonas;
        } else {
            return 0;
        }
    }

    public function obtenerEdadMasJoven() {
        return $this->edadMasJoven;
    }

    public function obtenerTotalPersonas() {
        return $this->totalPersonas;
    }
}

// Crear una instancia de la clase Fiesta
$fiesta = new Fiesta();

// Solicitar edades y realizar cálculos hasta que se ingrese 0
while (true) {
    $edad = intval(readline("Ingrese la edad (o 0 para finalizar): "));
    $fiesta->agregarPersona($edad);
}

// Mostrar resultados
echo "Resultados:" . PHP_EOL;
echo "Total de personas que asistieron a la fiesta: " . $fiesta->obtenerTotalPersonas() . PHP_EOL;
echo "Promedio de edades: " . $fiesta->calcularPromedioEdades() . PHP_EOL;
echo "Edad de la persona más joven que asistió: " . $fiesta->obtenerEdadMasJoven() . PHP_EOL;
?>
