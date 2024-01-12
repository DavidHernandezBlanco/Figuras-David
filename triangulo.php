<?php
// Clase para el triángulo
class Triangulo extends FiguraGeometrica implements PerimetroM {
    protected $lado2;
    protected $altura;

    public function __construct($base, $lado2, $altura = null) {
        parent::__construct("Triángulo", $base);
        $this->lado2 = $lado2;
        $this->altura = $altura ?? $lado2 / 2; // Utiliza la mitad del lado2 si altura no se proporciona
    }

    public function getLado2() {
        return $this->lado2;
    }

    public function setLado2($lado2) {
        $this->lado2 = $lado2;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function area() {
        // Implementa el cálculo del área para el triángulo con base y altura
        return ($this->getLado1() * $this->altura) / 2;
    }

    public function perimetro() {
        // Implementa el cálculo del perímetro para el triángulo
        return $this->getLado1() + $this->lado2 + parent::getLado1();
    }
}

?>
