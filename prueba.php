<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="robotica">  
        <div class="titulo-cont"><h1>Proyectos de robótica registrados</h1></div>
        <div class="buscadores">
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="categoria-checkbox" value="robot seguidor de linea">
                    Robot Seguidor de Línea
                </label>
                <label>
                    <input type="checkbox" class="categoria-checkbox" value="minisumo">
                    Mini Sumo
                </label>
                <label>
                    <input type="checkbox" class="categoria-checkbox" value="futbolero o de servicio">
                    Futbolero o de Servicio
                </label>
            </div>

            <div class="coolinput">
                <input type="text" id="buscadorR" placeholder="Buscar por título" class="input">
            </div>
        </div>
        <div class="resultadoRobotica">
            <div class="proyectosRobotica">
                <div class="datos">
                    <h3 class="institucionR">itey</h3>
                    <p class="categoria">minisumo</p>
                    <h4>nombre 1</h4>
                </div>
                <div class="datos">
                    <h3 class="institucionR">carlos lleras</h3>
                    <p class="categoria">minisumo</p>
                    <h4>nombre 2</h4>
                </div>
                <div class="datos">
                    <h3 class="institucionR">carlos lleras</h3>
                    <p class="categoria">minisumo</p>
                    <h4>nombre 2</h4>
                </div>
                <div class="datos">
                    <h3 class="institucionR">marco tulio</h3>
                    <p class="categoria">robot seguidor de linea</p>
                    <h4>nombre 3</h4>
                </div>
                <div class="datos">
                    <h3 class="institucionR">roberto</h3>
                    <p class="categoria">robot seguidor de linea</p>
                    <h4>nombre 4</h4>
                </div>
                <div class="datos">
                    <h3 class="institucionR">mateo</h3>
                    <p class="categoria">futbolero o de servicio</p>
                    <h4>nombre 5</h4>
                </div>
                <div class="datos">
                    <h3 class="institucionR">braulio</h3>
                    <p class="categoria">futbolero o de servicio</p>
                    <h4>nombre 6</h4>
                </div>
            </div>
        </div>
    </section>

    <script>
        const categoriaCheckboxes = document.querySelectorAll('.categoria-checkbox');
        const buscadorInput = document.getElementById('buscadorR');
        const datosElements = document.querySelectorAll('.datos');

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
    </script>
</body>
</html>
