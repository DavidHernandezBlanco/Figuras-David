<?php
include "figuras.php";
include "rectangulo.php";
include "triangulo.php";
include "circulo.php";
include "cuadrado.php";

$errors = [];

// Página principal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar formulario
    $figura = $_POST['tipoFigura'];
    $lado1 = floatval($_POST['lado1']);

    if (!in_array($figura, ['Triangulo', 'Rectangulo', 'Cuadrado', 'Circulo'])) {
        $errors[] = "Tipo de figura no válido";
    }

    if ($lado1 <= 0) {
        $errors[] = "Lado 1 debe ser un número positivo";
    }

    // Validar lado2 para Triángulo y Rectángulo
    if ($figura === 'Triangulo' || $figura === 'Rectangulo') {
        $lado2 = floatval($_POST['lado2']);
        if ($lado2 <= 0) {
            $errors[] = "Lado 2 debe ser un número positivo";
        }
    }

    // Mostrar errores si existen
    if (!empty($errors)) {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error de validación",
                text: "' . implode('\n', $errors) . '",
                confirmButtonColor: "#007bff"
            });
        </script>';
    } else {
        // Si no hay errores, continuar con el código para manejar el formulario
        $figura = $_POST['tipoFigura'];

        if ($figura === 'Triangulo') {
            $lado2 = floatval($_POST['lado2']);
            $figura = new Triangulo($lado1, $lado2);
        } elseif ($figura === 'Rectangulo') {
            $lado2 = floatval($_POST['lado2']);
            $figura = new Rectangulo($lado1, $lado2);
        } elseif ($figura === 'Cuadrado') {
            $figura = new Cuadrado("Cuadrado", $lado1);
        } elseif ($figura === 'Circulo') {
            $figura = new Circulo("Circulo", $lado1);
        }
        
        // Calcular área y perímetro
        $area = $figura->area();
        $perimetro = $figura->perimetro();
        

        // Mostrar resultados con estilos
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Resultados</title>
            <link rel="stylesheet" href="./css/styles.css">
        </head>
        <body>
            <div class="resultados">
                <h2 class="text-center">Resultados</h2>
                <p class="mb-1">Tipo de figura: <?= $figura->getTipoFigura() ?></p>
                <p class="mb-1">Lado 1: <?= $figura->getLado1() ?></p>
                <?php if (isset($lado2)) : ?>
                    <p class="mb-1">Lado 2: <?= $lado2 ?></p>
                <?php endif; ?>
                <p class="mb-1">Área: <?= $area ?></p>
                <p class="mb-1">Perímetro: <?= $perimetro ?></p>
                <br>
                <button onclick="irAtras()" class="btn btn-primary">Atrás</button>
            </div>

            <!-- SweetAlert2 JS -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="./js/script.js"></script>
        </body>
        </html>
        <?php
        exit; // Terminar el script después de mostrar resultados
    }
} else {
    // Mostrar formulario
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora de Figuras Geométricas</title>
        <!-- SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles2.css">
    </head>
    <body class="container mt-5">
        <h1 class="text-center">Selecciona una figura geométrica</h1>
        <form action="" method="post" class="mx-auto" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="tipoFigura">Tipo de Figura:</label>
                <select class="form-control" name="tipoFigura" id="tipoFigura">
                    <option value="Triangulo">Triángulo</option>
                    <option value="Rectangulo">Rectángulo</option>
                    <option value="Cuadrado">Cuadrado</option>
                    <option value="Circulo">Círculo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lado1">Lado 1:</label>
                <input type="number" class="form-control" name="lado1" id="lado1">
                <span id="errorLado1" style="color: red;"></span>
            </div>

            <div class="form-group">
            <label for="lado2">Lado 2 (solo para Triángulo y Rectángulo):</label>
            <input type="number" class="form-control" name="lado2" id="lado2" disabled>
            <span id="errorLado2" style="color: red;"></span>
        </div>


            <button type="submit" class="btn btn-primary btn-block">Calcular</button>
        </form>
        <script src="./js/script.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-9aD5VamoNlXy+i+1AuSfTz1aMbsv6QY0xkqF6WgDRGrFq0RJLpGShngzky1R3DAf" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6pBkS0lE9RMI/RmN52l8DA/DJ4NHAfF5" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
}
?>