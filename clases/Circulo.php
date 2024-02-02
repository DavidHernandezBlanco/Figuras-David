<?php

class Circulo extends FiguraGeometrica {
    protected $radio;

    public function __construct($radio) {
        parent::__construct("Circulo", $radio);
        $this->radio = $radio;
    }

    public function getRadio() {
        return $this->radio;
    }

    public function calcularArea() {
        return Utiles::area($this);
    }

    public function calcularPerimetro() {
        return Utiles::perimetro($this);
    }

    public function toString() {
        return parent::toString() . ", Radio: " . $this->radio;
    }
}
