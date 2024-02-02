<?php

class Rectangulo extends FiguraGeometrica {
    protected $lado1;
    protected $lado2;

    public function __construct($lado1, $lado2) {
        parent::__construct("Rectangulo", $lado1);
        $this->lado1 = $lado1;
        $this->lado2 = $lado2;
    }

    public function getLado1() {
        return $this->lado1;
    }

    public function getLado2() {
        return $this->lado2;
    }

    public function calcularArea() {
        return Utiles::area($this);
    }

    public function calcularPerimetro() {
        return Utiles::perimetro($this);
    }

    public function toString() {
        return parent::toString() . ", Lado 1: " . $this->lado1 . ", Lado 2: " . $this->lado2;
    }
}
