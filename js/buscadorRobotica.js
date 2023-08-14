const categoriaCheckboxes = document.querySelectorAll('.categoria-checkbox');
const buscadorInput = document.getElementById('buscadorR');
const datosElements = document.querySelectorAll('.proyectosRobotica');

function actualizarFiltros() {
    const textoBusqueda = buscadorInput.value.toLowerCase();
    const categoriaSeleccionada = Array.from(categoriaCheckboxes).find(checkbox => checkbox.checked);

    datosElements.forEach(datos => {
        const institucion = datos.querySelector('.institucionR').textContent.toLowerCase();
        const categoria = datos.querySelector('.categoria').textContent.toLowerCase();

        const mostrarPorCategoria = !categoriaSeleccionada || categoriaSeleccionada.value.toLowerCase() === categoria;
        const mostrarPorTexto = institucion.includes(textoBusqueda);

        if (mostrarPorCategoria && mostrarPorTexto) {
            datos.style.display = 'block';
        } else {
            datos.style.display = 'none';
        }
    });
}

categoriaCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            categoriaCheckboxes.forEach(otherCheckbox => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        }
        actualizarFiltros();
    });
});

buscadorInput.addEventListener('input', actualizarFiltros);

// Mostrar todos los resultados al cargar la página
actualizarFiltros();

