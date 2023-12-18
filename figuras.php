<?php

// Interfaz para el cálculo del perímetro
interface PerimetroM {
    public function perimetro();
}

// Clase base para las figuras geométricas
abstract class FiguraGeometrica {
    protected $tipoFigura;
    protected $lado1;

    public function __construct($tipoFigura, $lado1) {
        $this->tipoFigura = $tipoFigura;
        $this->lado1 = $lado1;
    }

    public function getTipoFigura() {
        return $this->tipoFigura;
    }

    public function getLado1() {
        return $this->lado1;
    }

    public function setTipoFigura($tipoFigura) {
        $this->tipoFigura = $tipoFigura;
    }

    public function setLado1($lado1) {
        $this->lado1 = $lado1;
    }

    abstract public function area();
}