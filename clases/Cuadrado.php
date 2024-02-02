<?php

class Cuadrado extends FiguraGeometrica {
    protected $lado;

    public function __construct($lado) {
        parent::__construct("Cuadrado", $lado);
        $this->lado = $lado;
    }

    public function getLado() {
        return $this->lado;
    }

    public function calcularArea() {
        return Utiles::area($this);
    }

    public function calcularPerimetro() {
        return Utiles::perimetro($this);
    }

    public function toString() {
        return parent::toString() . ", Lado: " . $this->lado;
    }
}
