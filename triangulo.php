<?php
// Clase para el triángulo
class Triangulo extends FiguraGeometrica implements PerimetroM {
    // Propiedades de la clase
    protected $lado2;
    protected $altura;

    // Constructor de la clase
    public function __construct($base, $lado2, $altura = null) {
        // Llama al constructor de la clase base (FiguraGeometrica) con el nombre "Triángulo" y la longitud de la base
        parent::__construct("Triángulo", $base);

        // Inicializa las propiedades del triángulo
        $this->lado2 = $lado2;
        // Utiliza la altura proporcionada, o la mitad del lado2 si la altura no se proporciona
        $this->altura = $altura ?? $lado2 / 2;
    }

    // Métodos de acceso para obtener y establecer el valor del lado2
    public function getLado2() {
        return $this->lado2;
    }

    public function setLado2($lado2) {
        $this->lado2 = $lado2;
    }

    // Métodos de acceso para obtener y establecer el valor de la altura
    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    // Implementación del método para calcular el área del triángulo
    public function area() {
        return ($this->getLado1() * $this->altura) / 2;
    }

    // Implementación del método para calcular el perímetro del triángulo
    public function perimetro() {
        return $this->getLado1() + $this->lado2 + parent::getLado1();
    }
}

?>
