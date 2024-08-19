function mostrarErrores(idformulario, errores) {
    const campos_con_errores = Object.keys(errores);

    // Reseteando los mensajes de error
    const formulario = document.getElementById(idformulario);
    const campos_formulario = formulario.elements;
    for (let i = 0; i < campos_formulario.length; i++) {
        campos_formulario[i].classList.remove('is-invalid');

        // Removiendo el div de errores anterior, si existe
        const div_error = document.getElementById('div_error_' + idformulario + '_' + campos_formulario[i].name);
        if (div_error) {
            div_error.remove();
        }
    }

    // Mostrar los errores
    campos_con_errores.forEach(function(item) {
        const campo = formulario.querySelector(`[name="${item}"]`);
        if (campo) {
            campo.classList.add('is-invalid'); // Añadir clase de Bootstrap para marcar el campo en rojo

            // Construir los mensajes de error
            const mensajes_error = errores[item]; // array
            let lista_errores = '';
            mensajes_error.forEach(function(mensaje) {
                lista_errores += `<li>${mensaje}</li>`;
            });

            // Crear el div de error si no existe y añadirlo después del campo
            let div_error = document.getElementById('div_error_' + idformulario + '_' + item);
            if (!div_error) {
                div_error = document.createElement('div');
                div_error.id = 'div_error_' + idformulario + '_' + item;
                div_error.className = 'invalid-feedback';
                campo.parentNode.appendChild(div_error);
            }

            div_error.innerHTML = `<ul>${lista_errores}</ul>`;
        }
    });
}

function limpiarErrores(idformulario) {
    // Reseteando los mensajes de error
    const formulario = document.getElementById(idformulario);
    const campos_formulario = formulario.elements;
    for (let i = 0; i < campos_formulario.length; i++) {
        campos_formulario[i].classList.remove('is-invalid');

        // Remover los divs de error si existen
        const div_error = document.getElementById('div_error_' + idformulario + '_' + campos_formulario[i].name);
        if (div_error) {
            div_error.remove();
        }
    }
}
