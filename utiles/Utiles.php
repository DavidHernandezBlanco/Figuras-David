<?php
// Clase de utilidades llamada Utiles
class Utiles {

    // Método estático para calcular el área de una figura geométrica
    public static function area($obj) {
        // Estructura de control para calcular el área según el tipo de objeto
        if ($obj instanceof Triangulo) {
            return $obj->getLado2() * $obj->getLado3(); // Área de Triángulo
        } elseif ($obj instanceof Rectangulo) {
            return $obj->getLado1() * $obj->getLado2(); // Área de Rectángulo
        } elseif ($obj instanceof Cuadrado) {
            return pow($obj->getLado(), 2); // Área de Cuadrado
        } elseif ($obj instanceof Circulo) {
            return M_PI * pow($obj->getRadio(), 2); // Área de Círculo
        } else {
            return null; // Manejar otros casos si es necesario
        }
    }

    // Método estático para calcular el perímetro de una figura geométrica
    public static function perimetro($obj) {
        // Estructura de control para calcular el perímetro según el tipo de objeto
        if ($obj instanceof Triangulo) {
            return 2 * ($obj->getLado2() + $obj->getLado3()); // Perímetro de Triángulo
        } elseif ($obj instanceof Rectangulo) {
            return 2 * ($obj->getLado1() + $obj->getLado2()); // Perímetro de Rectángulo
        } elseif ($obj instanceof Cuadrado) {
            return 4 * $obj->getLado(); // Perímetro de Cuadrado
        } elseif ($obj instanceof Circulo) {
            return 2 * M_PI * $obj->getRadio(); // Perímetro de Círculo
        } else {
            return null; // Manejar otros casos si es necesario
        }
    }

    // [OPCIONAL] Método estático up2 para calcular el cuadrado de un número
    public static function up2($num1) {
        return $num1 * $num1;
    }
}
?>
