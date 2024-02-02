<?php
// Definición de la clase Triangulo que hereda de FiguraGeometrica
class Triangulo extends FiguraGeometrica {
    // Propiedades (atributos) protegidos
    protected $lado1;
    protected $lado2;

    // Constructor de la clase, inicializa los lados del triángulo
    public function __construct($lado1, $lado2) {
        $this->lado1 = $lado1;
        $this->lado2 = $lado2;
    }

    // Método para obtener el valor del primer lado del triángulo
    public function getLado2() {
        return $this->lado1;
    }

    // Método para obtener el valor del segundo lado del triángulo
    public function getLado3() {
        return $this->lado2;
    }

    // Método para calcular el área del triángulo
    public function calcularArea() {
        // Implementación directa del cálculo del área en la clase Triangulo
        return 0.5 * $this->lado1 * $this->lado2;
    }

    // Método para calcular el perímetro del triángulo utilizando la clase Utiles
    public function calcularPerimetro() {
        return Utiles::perimetro($this);
    }

    // Método para representar el objeto en forma de cadena de texto
    public function toString() {
        // Se utiliza el método toString de la clase padre (FiguraGeometrica)
        // y se agrega información específica de Triangulo (Lado 2 y Lado 3)
        return parent::toString() . ", Lado 2: " . $this->lado1 . ", Lado 3: " . $this->lado2;
    }
}
?>
