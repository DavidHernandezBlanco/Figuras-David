<?php
// Definición de la clase abstracta FiguraGeometrica
abstract class FiguraGeometrica {
    // Propiedades (atributos) protegidos
    protected $tipoFigura;
    protected $base;

    // Constructor de la clase, inicializa el tipo de figura y la base
    public function __construct($tipoFigura, $base) {
        $this->tipoFigura = $tipoFigura;
        $this->base = $base;
    }

    // Método para obtener el tipo de figura
    public function getTipoFigura() {
        return $this->tipoFigura;
    }

    // Método para obtener el valor de la base
    public function getBase() {
        return $this->base;
    }

    // Método abstracto para calcular el área (debe ser implementado por las clases hijas)
    abstract public function calcularArea();

    // Método abstracto para calcular el perímetro (debe ser implementado por las clases hijas)
    abstract public function calcularPerimetro();

    // Método para representar el objeto en forma de cadena de texto
    public function toString() {
        return "Tipo: " . $this->tipoFigura . ", Base: " . $this->base;
    }
}
?>
