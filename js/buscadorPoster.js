const input = document.getElementById('buscador');
const resultadoBusqueda = document.querySelector('.resultado-de-busqueda');

input.addEventListener('input', function() {
    const searchTerm = input.value.trim().toLowerCase();
    const proyectos = resultadoBusqueda.querySelectorAll('.proyectos');

    proyectos.forEach(proyecto => {
        const titulo = proyecto.querySelector('#titulo').textContent.toLowerCase();

        if (titulo.includes(searchTerm)) {
            proyecto.style.display = 'block';
        } else {
            proyecto.style.display = 'none';
        }
    });
});