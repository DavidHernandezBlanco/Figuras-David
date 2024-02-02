<?php
// Función de carga automática para las clases
function carga($class) {
    // Definir la ruta para los archivos de clases en el directorio 'clases'
    $ruta = './clases/' . $class . '.php';
    
    // Verificar si el archivo de la clase existe
    if (file_exists($ruta)) {
        // Si existe, incluir el archivo de la clase
        require_once $ruta;
    }

    // Definir la ruta para los archivos de utilidad en el directorio 'utiles'
    $ruta = './utiles/' . $class . '.php';
    
    // Verificar si el archivo de utilidad existe
    if (file_exists($ruta)) {
        // Si existe, incluir el archivo de utilidad
        require_once $ruta;
    }
}

// Registrar la función de carga automática con SPL (Biblioteca PHP Estándar)
spl_autoload_register('carga');
?>
