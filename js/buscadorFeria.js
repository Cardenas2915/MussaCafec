
const inputFeria = document.getElementById('buscadorFeria');
const resultadoFeria = document.querySelector('.resultadoFeria');

inputFeria.addEventListener('input', function() {
    const searchTerm = inputFeria.value.trim().toLowerCase();
    const proyectos = resultadoFeria.querySelectorAll('.proyectosFeria');

    proyectos.forEach(proyecto => {
        const tituloFeria = proyecto.querySelector('#titulo_feria').textContent.toLowerCase();

        if (tituloFeria.includes(searchTerm)) {
            proyecto.style.display = 'block';
        } else {
            proyecto.style.display = 'none';
        }
    });
});