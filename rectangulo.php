<?php
// Clase para el rectángulo
class Rectangulo extends FiguraGeometrica implements PerimetroM {
    protected $lado2;

    public function __construct($lado1, $lado2) {
        parent::__construct("Rectángulo", $lado1);
        $this->lado2 = $lado2;
    }

    public function getLado2() {
        return $this->lado2;
    }

    public function setLado2($lado2) {
        $this->lado2 = $lado2;
    }

    public function area() {
        // Implementa el cálculo del área para el rectángulo
        return $this->lado1 * $this->lado2;
    }

    public function perimetro() {
        // Implementa el cálculo del perímetro para el rectángulo
        return 2 * ($this->lado1 + $this->lado2);
    }

    public function toString() {
        return "Tipo: " . $this->tipoFigura . ", Lado 1: " . $this->lado1 . ", Lado 2: " . $this->lado2;
    }
}