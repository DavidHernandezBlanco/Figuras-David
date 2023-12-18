<?php
// Clase para el cuadrado
class Cuadrado extends FiguraGeometrica implements PerimetroM {
    public function area() {
        // Implementa el cálculo del área para el cuadrado
        return pow($this->lado1, 2);
    }

    public function perimetro() {
        // Implementa el cálculo del perímetro para el cuadrado
        return 4 * parent::getLado1();
    }

    public function toString() {
        return "Tipo: " . $this->tipoFigura . ", Lado: " . $this->lado1;
    }
}