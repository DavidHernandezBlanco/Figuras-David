<?php
require_once './auto/autocarga.php';

// Inicializar $figura con un valor predeterminado
$figura = null;

// Array para almacenar mensajes de error durante la validación
$errors = [];

// Número para calcular su cuadrado
$numero = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobar si 'tipoFigura' y 'lado1' están presentes en $_POST
    if (isset($_POST['tipoFigura'], $_POST['lado1'])) {
        // Obtener y validar datos del formulario
        $figura = $_POST['tipoFigura'];
        $lado1 = floatval($_POST['lado1']);

        // Validar el tipo de figura seleccionado
        if (!in_array($figura, ['Triangulo', 'Rectangulo', 'Cuadrado', 'Circulo'])) {
            $errors[] = "Tipo de figura no válido";
        }

        // Validar que el lado 1 sea un número positivo
        if ($lado1 <= 0) {
            $errors[] = "Lado 1 debe ser un número positivo";
        }

        // Validar lado 2 para Triángulo y Rectángulo
        if ($figura === 'Triangulo' || $figura === 'Rectangulo') {
            if (!isset($_POST['lado2'])) {
                $errors[] = "Lado 2 no especificado";
            } else {
                $lado2 = floatval($_POST['lado2']);
                if ($lado2 <= 0) {
                    $errors[] = "Lado 2 debe ser un número positivo";
                }
            }
        }
    } else {
        $errors[] = "Datos del formulario incompletos";
    }

    // Validar el campo 'numero' para el cuadrado
    if (isset($_POST['numero'])) {
        $numero = floatval($_POST['numero']);
        if ($numero <= 0) {
            $errors[] = "El número debe ser un número positivo";
        }
    }

    // Mostrar errores con SweetAlert2 si existen
    if (!empty($errors)) {
        mostrarErrores($errors);
    } else {
        // Si no hay errores, continuar con el código para manejar el formulario
        $figura = crearFigura($figura, $lado1, $lado2 ?? null);

        // Calcular área y perímetro
        $area = Utiles::area($figura);
        $perimetro = Utiles::perimetro($figura);

        // Generar página de resultados
        mostrarResultados($figura, $lado1, $lado2 ?? null, $area, $perimetro, $numero);
        exit; // Terminar el script después de mostrar resultados
    }
}

// Mostrar formulario si no se ha enviado
mostrarFormulario();

function crearFigura($tipo, $lado1, $lado2) {
    switch ($tipo) {
        case 'Triangulo':
            return new Triangulo($lado1, $lado2);
        case 'Rectangulo':
            return new Rectangulo($lado1, $lado2);
        case 'Cuadrado':
            return new Cuadrado($lado1);
        case 'Circulo':
            return new Circulo($lado1);
    }
}

function mostrarResultados($figura, $lado1, $lado2, $area, $perimetro, $numero) {
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
        <p class="mb-1">Lado 1: <?= $lado1 ?></p>
        <?php if ($lado2 !== null) : ?>
            <p class="mb-1">Lado 2: <?= $lado2 ?></p>
        <?php endif; ?>

        <p class="mb-1">Área: <?= $area !== null ? $area : 'N/A' ?></p>
        <p class="mb-1">Perímetro: <?= $perimetro !== null ? $perimetro : 'N/A' ?></p>
        <?php if ($numero !== null) : ?>
            <br>
            <p class="mb-1">Número ingresado: <?= $numero ?></p>
            <p class="mb-1">Cuadrado del número: <?= Utiles::up2($numero) ?></p>
        <?php endif; ?>
        <br>
        <button onclick="irAtras()" class="btn btn-primary">Atrás</button>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="./js/script.js"></script>
    </body>
    </html>
    <?php
}

function mostrarErrores($errors) {
    echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error de validación",
            text: "' . implode('\n', $errors) . '",
            confirmButtonColor: "#007bff"
        });
    </script>';
}

function mostrarFormulario() {
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

            <!-- Nuevo campo para ingresar el número -->
            <div class="form-group">
                <label for="numero">Número para calcular su cuadrado:</label>
                <input type="number" class="form-control" name="numero" id="numero">
                <span id="errorNumero" style="color: red;"></span>
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
