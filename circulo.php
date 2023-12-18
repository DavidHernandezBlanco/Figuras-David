<?php
// Clase para el círculo
class Circulo extends FiguraGeometrica implements PerimetroM {
    public function area() {
        // Implementa el cálculo del área para el círculo
        return pi() * pow($this->lado1, 2);
    }

    public function perimetro() {
        // Implementa el cálculo del perímetro para el círculo
        return 2 * pi() * parent::getLado1();
    }

    public function toString() {
        return "Tipo: " . $this->tipoFigura . ", Radio: " . $this->lado1;
    }
}