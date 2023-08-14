//FUNCION PARA MOSTRAR LAS SECCIONES 
// Obtén las etiquetas de enlace (a) del menú
const enlacesMenu = document.querySelectorAll('.submenu-nav a');
// Obtén todas las secciones de categorías
const seccionesCategorias = document.querySelectorAll('.categorias');
// Muestra por defecto la sección de Ponente y oculta las demás
seccionesCategorias.forEach((seccion, index) => {
    if (index === 0) {
        seccion.style.display = 'block';
    } else {
        seccion.style.display = 'none';
    }
});
// Agrega el evento de clic a las etiquetas de enlace (a) del menú
enlacesMenu.forEach(enlace => {
    enlace.addEventListener('click', mostrarSeccion);
});
// Función para mostrar la sección correspondiente al hacer clic en una etiqueta
function mostrarSeccion(event) {
    event.preventDefault();
    // Oculta todas las secciones de categorías
    seccionesCategorias.forEach(seccion => {
        seccion.style.display = 'none';
    });
    // Muestra la sección correspondiente al enlace clicado
    const seccionId = event.target.getAttribute('href');
    const seccionMostrar = document.querySelector(seccionId);
    seccionMostrar.style.display = 'block';
}

// FUNCION PARA MOSTRAR O OCULTAR LOS INPUT 
function mostrar() {
    var selectElement = document.getElementById("Institucion");
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;

    var divExterna = document.querySelector(".mostrar-input-externa");
    var divSena = document.querySelector(".mostrar-input-sena");

    if (selectedOption === "Externa") {
        divExterna.style.display = "block";
        divSena.style.display = "none";
    } else if (selectedOption === "SENA") {
        divExterna.style.display = "none";
        divSena.style.display = "block";
    } else {
        divExterna.style.display = "none";
        divSena.style.display = "none";
    }
}
mostrar();
//FUNCION PARA AGREGAR MAS PONENTES LIMITANDO A 3 COMO MAX
function crearCampos() {
    var selectElement = document.getElementById("Ponentes");
    var numPonentes = parseInt(selectElement.options[selectElement.selectedIndex].value);
    var contenedorPonentes = document.getElementById("contenedorPonentes");
    contenedorPonentes.innerHTML = "";

    for (var i = 1; i <= numPonentes; i++) {
        var divPonente = document.createElement("div");
        divPonente.className = "div-ponente";

        var nombreInput = document.createElement("input");
        nombreInput.type = "text";
        nombreInput.placeholder = "Nombre del ponente";
        nombreInput.name = "nombre" + i;
        nombreInput.className = "input input-ponente"; 
        divPonente.appendChild(nombreInput);

        var correoInput = document.createElement("input");
        correoInput.type = "email";
        correoInput.placeholder = "Correo del ponente";
        correoInput.name = "correo" + i;
        correoInput.className = "input input-ponente"; 
        divPonente.appendChild(correoInput);

        var contactoInput = document.createElement("input");
        contactoInput.type = "text";
        contactoInput.placeholder = "Número de contacto";
        contactoInput.name = "contacto" + i;
        contactoInput.className = "input input-ponente"; 
        divPonente.appendChild(contactoInput);

        contenedorPonentes.appendChild(divPonente);
    }
}
//funcion para descargar el archivo ponente
function descargarArchivoPonente() {
    var archivoPonencia = "./resources/FormatoPonencia.docx"; // Reemplaza "ruta_archivo" con la ruta real de tu archivo
    // Obtén la extensión del archivo seleccionado
    var extensionPonencia = archivoPonencia.split('.docx').pop().toLowerCase();
    // Define el nombre del archivo para descarga
    var nombreArchivoPonencia = "FormatoPonencia" + extensionPonencia;
    // Crea un enlace <a> temporal para la descarga
    var enlaceDescargaPonencia = document.createElement('a');
    enlaceDescargaPonencia.href = archivoPonencia;
    enlaceDescargaPonencia.download = nombreArchivoPonencia;
    // Simula un clic en el enlace para iniciar la descarga
    enlaceDescargaPonencia.click();
}

//CREACION DE INPUT EN EL FORMULARIO DE POSTER
const participantesInput = document.getElementById('participantes');
const contenedorInputs = document.getElementById('contenedorParticipantes');

participantesInput.addEventListener('input', () => {
    contenedorInputs.innerHTML = ''; // Limpiamos el contenido previo 
    const numParticipantes = parseInt(participantesInput.value); 
    for (let i = 1; i <= numParticipantes; i++) {
        if (i > 3) {
            break; // Limitamos la creación a 6 divs
        }  
        const divInput = document.createElement('div');
        divInput.className = 'coolinput';
        
        const labelNombre = document.createElement('label');
        labelNombre.className = 'text';
        labelNombre.textContent = `Nombre_del_participante_${i}`;
        
        const inputNombre = document.createElement('input');
        inputNombre.type = 'text';
        inputNombre.name = 'participante'+i;
        inputNombre.className = "input";
        inputNombre.placeholder = `Participante ${i}`;
        
        const labelCorreo = document.createElement('label');
        labelCorreo.className = 'text';
        labelCorreo.textContent = `Correo del participante ${i}:`;
        
        const inputCorreo = document.createElement('input');
        inputCorreo.type = 'email';
        inputCorreo.name = "correo"+i;
        inputCorreo.className = "input";
        inputCorreo.placeholder = `Correo ${i}`;
        
        const labelContacto = document.createElement('label');
        labelContacto.className = 'text';
        labelContacto.textContent = `Contacto del participante ${i}:`;
        
        const inputContacto = document.createElement('input');
        inputContacto.type = 'text';
        inputContacto.name = "contacto"+i
        inputContacto.className = "input";
        inputContacto.placeholder = `Contacto ${i}`;
        
        divInput.appendChild(labelNombre);
        divInput.appendChild(inputNombre);
        divInput.appendChild(labelCorreo);
        divInput.appendChild(inputCorreo);
        divInput.appendChild(labelContacto);
        divInput.appendChild(inputContacto);
        
        contenedorInputs.appendChild(divInput);
    }
});
//funcion para descargar el archivo poster
function descargarArchivoPoster() {
    var archivoPoster = "./resources/PosterEstructura.docx"; // Reemplaza "ruta_archivo" con la ruta real de tu archivo
    var extensionPoster = archivoPoster.split('.docx').pop().toLowerCase();
    var nombreArchivoPoster = "PosterEstructura" + extensionPoster;
    var enlaceDescargaPoster = document.createElement('a');
    enlaceDescargaPoster.href = archivoPoster;
    enlaceDescargaPoster.download = nombreArchivoPoster;
    enlaceDescargaPoster.click();
}

//funcion para descargar el archivo Feria Empresarial
function descargarArchivoFeriaEmpresarial() {
    var archivoFeria = "./resources/Presentacion-encuentro-de-investigacion.pptx"; // Reemplaza "ruta_archivo" con la ruta real de tu archivo
    // Obtén la extensión del archivo seleccionado
    var extensionFeria = archivoFeria.split('.pptx').pop().toLowerCase();
    // Define el nombre del archivo para descarga
    var nombreArchivoFeria = "Presentacion-encuentro-de-investigacion" + extensionFeria;
    // Crea un enlace <a> temporal para la descarga
    var enlaceDescargaFeria = document.createElement('a');
    enlaceDescargaFeria.href = archivoFeria;
    enlaceDescargaFeria.download = nombreArchivoFeria;
    // Simula un clic en el enlace para iniciar la descarga
    enlaceDescargaFeria.click();
}
//funcion para descargar el archivo Feria Empresarial
function descargarArchivoRobotica() {
    var archivoRobotica = "./resources/TORNEO-DE-ROBOTICA-SENA-CAFEC_esp_técnicas_cat.pdf"; // Reemplaza "ruta_archivo" con la ruta real de tu archivo
    // Obtén la extensión del archivo seleccionado
    var extensionRobotica = archivoRobotica.split('.pdf').pop().toLowerCase();
    // Define el nombre del archivo para descarga
    var nombreArchivoRobotica = "TORNEO-DE-ROBOTICA-SENA-CAFEC_esp_técnicas_cat" + extensionRobotica;
    // Crea un enlace <a> temporal para la descarga
    var enlaceDescargaRobotica = document.createElement('a');
    enlaceDescargaRobotica.href = archivoRobotica;
    enlaceDescargaRobotica.download = nombreArchivoRobotica;
    // Simula un clic en el enlace para iniciar la descarga
    enlaceDescargaRobotica.click();
}





