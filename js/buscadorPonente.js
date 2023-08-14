
const busquedaInput = document.getElementById('busquedaInput');
const filtroSenaCheckbox = document.getElementById('filtroSena');
const filtroExternaCheckbox = document.getElementById('filtroExterna');
const resultadosDiv = document.querySelector('.resultados').children;

function deseleccionarOtroCheckbox(checkbox) {
    if (checkbox === filtroSenaCheckbox) {
        filtroExternaCheckbox.checked = false;
    } else if (checkbox === filtroExternaCheckbox) {
        filtroSenaCheckbox.checked = false;
    }
}

function filtrarResultados() {
const filtroBusqueda = busquedaInput.value.toLowerCase();
const filtroTipo = filtroSenaCheckbox.checked ? 'SENA' : filtroExternaCheckbox.checked ? 'Externa' : '';

for (const resultado of resultadosDiv) {
    const tipoElemento = resultado.querySelector('#tipo').textContent;
    const tituloElemento = resultado.querySelector('#titulo').textContent.toLowerCase();
    const mostrarPorBusqueda = tituloElemento.includes(filtroBusqueda);
    const mostrarPorTipo = tipoElemento.includes(filtroTipo) || !filtroTipo;

    if (mostrarPorBusqueda && mostrarPorTipo) {
    resultado.style.display = 'block';
    } else {
    resultado.style.display = 'none';
    }
}
}

busquedaInput.addEventListener('input', filtrarResultados);
filtroSenaCheckbox.addEventListener('change', function () {
deseleccionarOtroCheckbox(filtroSenaCheckbox);
filtrarResultados();
});

filtroExternaCheckbox.addEventListener('change', function () {
deseleccionarOtroCheckbox(filtroExternaCheckbox);
filtrarResultados();
});

// Mostrar todos los elementos al cargar la página
filtrarResultados();
