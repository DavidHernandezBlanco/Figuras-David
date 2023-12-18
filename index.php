<?php

include "figuras.php";
include "rectangulo.php";
include "triangulo.php";
include "circulo.php";
include "cuadrado.php";

// Página principal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Manejar el formulario
    $tipoFigura = $_POST['tipoFigura'];
    $lado1 = floatval($_POST['lado1']);

    if ($tipoFigura === 'Triangulo') {
        $lado2 = floatval($_POST['lado2']);
        $figura = new Triangulo($lado1, $lado2);
    } elseif ($tipoFigura === 'Rectangulo') {
        $lado2 = floatval($_POST['lado2']);
        $figura = new Rectangulo($lado1, $lado2);
    } elseif ($tipoFigura === 'Cuadrado') {
        $figura = new Cuadrado("Cuadrado", $lado1);
    } elseif ($tipoFigura === 'Circulo') {
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
        <title>Resultados</title>
        <style>
            body {
                background-color: #f8f9fa;
                padding: 20px;
            }

            h2 {
                color: #007bff;
            }

            .resultados {
                max-width: 400px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            p {
                margin: 10px 0;
            }
        </style>
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
        </div>
    </body>
    </html>
    <?php
    exit; // Terminar el script después de mostrar resultados
} else {
    // Mostrar formulario
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Figuras Geométricas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        h1 {
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        select, input {
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
        }

        p {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body class="container mt-5">
    <h1 class="text-center">Selecciona una figura geométrica</h1>
    <form action="" method="post" class="mx-auto">
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
            <input type="number" class="form-control" name="lado1" required>
        </div>

        <div class="form-group">
            <label for="lado2">Lado 2 (solo para Triángulo y Rectángulo):</label>
            <input type="number" class="form-control" name="lado2">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Calcular</button>
    </form>

    <?php
    // Mostrar resultados si existen
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<div class='mt-4'>";
        echo "<p class='mb-1'>Tipo de figura: " . $figura->getTipoFigura() . "</p>";
        echo "<p class='mb-1'>Lado 1: " . $figura->getLado1() . "</p>";
        if (isset($lado2)) {
            echo "<p class='mb-1'>Lado 2: " . $lado2 . "</p>";
        }
        echo "<p class='mb-1'>Área: " . $area . "</p>";
        echo "<p class='mb-1'>Perímetro: " . $perimetro . "</p>";
        echo "</div>";
    }
    ?>

    <!-- Bootstrap JS (opcional, solo si necesitas funcionalidades específicas) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-9aD5VamoNlXy+i+1AuSfTz1aMbsv6QY0xkqF6WgDRGrFq0RJLpGShngzky1R3DAf" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6pBkS0lE9RMI/RmN52l8DA/DJ4NHAfF5" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>