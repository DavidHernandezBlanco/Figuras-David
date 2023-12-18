<?php
// Clase para el triángulo
class Triangulo extends FiguraGeometrica implements PerimetroM {
    protected $lado2;

    public function __construct($lado1, $lado2) {
        parent::__construct("Triángulo", $lado1);
        $this->lado2 = $lado2;
    }

    public function getLado2() {
        return $this->lado2;
    }

    public function setLado2($lado2) {
        $this->lado2 = $lado2;
    }

    public function area() {
        // Implementa el cálculo del área para el triángulo
        return ($this->lado1 * $this->lado2) / 2;
    }

    public function perimetro() {
        // Implementa el cálculo del perímetro para el triángulo
        return $this->lado1 + $this->lado2 + parent::getLado1();
    }
}