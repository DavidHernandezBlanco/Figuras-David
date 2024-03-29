function validarFormulario() {
    var figura = document.getElementById('tipoFigura').value;
    var lado1 = document.getElementById('lado1').value;
    var lado2 = document.getElementById('lado2').value;

    // Reiniciar mensajes de error
    document.getElementById('errorLado1').textContent = '';
    document.getElementById('errorLado2').textContent = '';

    // Validar Lado 1
    if (lado1 === '' || isNaN(lado1) || lado1 <= 0) {
        document.getElementById('errorLado1').textContent = 'Lado 1 debe ser un número positivo.';
        return false;
    }

    // Validar Lado 2 para Triángulo y Rectángulo si el campo está habilitado
    if ((figura === 'Triangulo' || figura === 'Rectangulo') && !document.getElementById('lado2').disabled) {
        if (lado2 === '' || isNaN(lado2) || lado2 <= 0) {
            document.getElementById('errorLado2').textContent = 'Lado 2 debe ser un número positivo.';
            return false;
        }
    }

    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        title: '¡Cálculos Completados!',
        html: `
            <p class="mb-1">Todos los cálculos se realizaron con éxito.</p>
            <hr>
            <p class="mb-0">Detalles adicionales o resultados aquí.</p>
        `,
        icon: 'success',
        showCloseButton: true,
        showConfirmButton: false,
        customClass: {
            closeButton: 'btn btn-secondary'
        }
    });
});


// Habilitar inicialmente el campo "lado2"
document.getElementById('lado2').disabled = false;

// Agrega un listener para detectar cambios en la opción seleccionada
document.getElementById('tipoFigura').addEventListener('change', function () {
    var figura = this.value;
    // Habilitar o deshabilitar el campo "lado2" según la opción seleccionada
    document.getElementById('lado2').disabled = !(figura === 'Triangulo' || figura === 'Rectangulo');
});


// Botón para ir atrás
function irAtras() {
    // Redirige a la página deseada
    window.location.href = 'index.php';
}
