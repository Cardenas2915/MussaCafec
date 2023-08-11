<link rel="stylesheet" href="./css/registro.css">
<main>
    <div class="main">
        <h1>Formularios de Registro para el VI Encuentro de Semilleros de Investigación SENA</h1>
        <p>Busca tu categoria da click, inscribete y participa</p>
    </div>
    <div class="submenu-nav">
        <a href="#ponente">Ponente</a>
        <a href="#poster">Poster</a>
        <a href="#FeriaEmpresarial">Feria empresarial</a>
        <a href="#Robotica">Torneo de robotica</a>
    </div>
</main>
<!-- FORMULARIO PARA LA CATEGORIA PONENTE -->
<section class="categorias" id="ponente">
    <div class="categorias_div">
        <div class="title-categorias">
            <h1>Categoria:Ponente</h1>
            <div class="descargar-formato">
                <p>Recuerda: Debes descargar el formato necesario para esta actividad</p>
                <button id="descargar" onclick="descargarArchivoPonente()">Descargar <img class="icon-descarga" src="./img/downloads.png" alt=""></button>
            </div>
        </div>    
        <div class="formulario">
            <form action="./config/registrarPonentes.php" method="POST" class="form">
                    <div class="coolinput">
                        <label for="eje" class="text">Eje tematico:</label>
                        <input type="text" placeholder="..." name="ejetematico" class="input" id="eje" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}">
                    </div>
                    <div class="coolinput">
                        <label for="Institucion" class="text">Institución de participación:</label>
                        <select id="Institucion" class="select" onchange="mostrar()">
                            <option value="">Seleccione una opcion</option>
                            <option value="SENA">SENA</option>
                            <option value="Externa">Externa</option>
                        </select>
                    </div>
                    <div class="mostrar-input-externa">
                        <div class="coolinput">
                            <label for="externa" class="text">Define tu Insitucion:</label>
                            <input type="text" placeholder="Nombre de la institucion..." name="externa" class="input" id="externa" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}">
                        </div>
                    </div>
                    <div class="mostrar-input-sena">
                        <div class="coolinput">
                            <label for="titulada" class="text">Titulada:</label>
                            <input type="text" placeholder="Nombre de la titulada.." name="titulada" class="input" id="titulada" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}">
                        </div>

                        <div class="coolinput">
                            <label for="ficha" class="text">Ficha:</label>
                            <input type="text" placeholder="# de ficha..." name="ficha" class="input" id="ficha" pattern="[0-9]{4,20}">
                        </div>
                    </div>
                    <div class="coolinput">
                        <label for="Ponentes" class="text">Numero de ponentes:</label>
                        <select id="Ponentes" name="numeroPonentes" class="select" onchange="crearCampos()">
                            <option value="">Seleccione una opcion</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="coolinput" id="contenedorPonentes"></div>
                    <div class="coolinput">
                        <label for="titulo" class="text">Titulo del Proyecto:</label>
                        <input type="text" placeholder="..." name="titulo" class="input" id="titulo">
                    </div>
                    <div class="coolinput">
                        <label for="Institucion" class="text">Tipo de proyecto:</label>
                        <select name="tipoProyecto" id="Institucion" class="select">
                            <option value="">Seleccione una opcion</option>
                            <option value="Formativo">Formativo</option>
                            <option value="Productivo">Productivo</option>
                            <option value="SENNOVA">SENNOVA</option>
                            <option value="Externo">Externo</option>
                        </select>
                    </div>
                    <div class="coolinput">
                        <span class="form-title">Se debe cargar documento en formato Word con la información del proyecto y 
                            documento en power point o pdf con la presentación del proyecto. (Limitar el tamaño
                            del documento a 20 Mb x documento).</span>
                        <label for="file-input" class="drop-container">
                            <span class="drop-title">Selecciona tus archivos aqui.</span>
                            <input type="file" name="archivo_1" accept=".pdf" id="file-input">
                            <input type="file" name="archivo_2" accept=".docx" id="file-input">
                        </label>
                    </div>
                    <div class="coolinput">
                        <input type="submit" value="Registarme" class="button-registro">
                    </div>
            </form>
        </div>
    </div>
</section>
<!-- FORMULARIO PARA LA CATEGORIA POSTER -->
<section class="categorias" id="poster">
    <div class="categorias_div">
        <div class="title-categorias">
            <h1>Categoria:Poster</h1>
            <div class="descargar-formato">
                <p>Recuerda: Debes descargar el formato necesario para esta actividad</p>
                <button id="descargar" onclick="descargarArchivoPoster()">Descargar <img class="icon-descarga" src="./img/downloads.png" alt=""></button>
            </div>
        </div>    
        <div class="formulario">
            <form action="./config/registrarPoster.php" method="POST" class="form">
                    <div class="coolinput">
                        <label for="nombreInstitucion" class="text">Institucion:</label>
                        <input type="text" placeholder="Nombre de la Institucion" name="nombreInstitucion" class="input" id="nombreInstitucion">
                    </div>
                    <div class="coolinput">
                        <label for="participantes" class="text">Participantes:</label>
                        <input type="text" name="Nparticipantes" min="1" max="6" placeholder="Ingrese el número de participantes (máximo 6)" class="input" id="participantes">
                    </div>
                    <div id="contenedorParticipantes"></div>
                    <div class="coolinput">
                        <label for="tituloProyecto" class="text">Titulo del proyecto:</label>
                        <input type="text" placeholder="..." name="tituloProyecto" class="input" id="tituloProyecto">
                    </div>
                    <div class="coolinput">
                        <span class="form-title">Se debe cargar la presentación o diseño del poster en pdf. (Tamaño máximo por
                            documento 20Mb)</span>
                        <label for="file-input" class="drop-container">
                            <span class="drop-title">Selecciona tus archivos aqui.</span>
                            <input type="file" accept=".pdf" id="file-input" name="archivo">
                        </label>
                    </div>
                    <div class="coolinput">
                        <input type="submit" value="Registarme" class="button-registro">
                    </div>
            </form>
        </div>
    </div>
</section>
<!-- FORMULARIO PARA LA CATEGORIA FERIA EMPRESARIAL -->
<section class="categorias" id="FeriaEmpresarial">
    <div class="categorias_div">
        <div class="title-categorias">
            <h1>Categoria:Feria Empresarial</h1>
            <div class="descargar-formato">
                <p>Recuerda descargar el formato necesario para esta actividad</p>
                <button id="descargar" onclick="descargarArchivoFeriaEmpresarial()">Descargar <img class="icon-descarga" src="./img/downloads.png" alt=""></button>
            </div>
        </div>    
        <div class="formulario">
            <form action="./config/registrarFeria.php" method="POST" class="form">
                    <div class="coolinput">
                        <label for="nombreInstitucionFeria" class="text">Institucion:</label>
                        <input type="text" placeholder="Nombre de la Institucion" name="nombreInstitucion" class="input" id="nombreInstitucionFeria">
                    </div>
                    <div class="coolinput">
                        <label for="N-participantes" class="text">N° de participantes:</label>
                        <input type="text" placeholder="Ingrese el número de participantes" class="input" id="N-participantes" name="participantes">
                    </div>
                    <div class="coolinput">
                        <label for="tituloProyectoFeria" class="text">Titulo del proyecto:</label>
                        <input type="text" placeholder="..." name="tituloProyecto" class="input" id="tituloProyectoFeria">
                    </div>
                    <div class="coolinput">
                        <span class="form-title">Requerimientos para el Stand (Aclarar que máximo 2 personas por proyecto, propuesto
                                    o emprendimiento)</span>
                    </div>
                    <div class="coolinput">
                        <input type="submit" value="Registarme" class="button-registro">
                    </div>
                    
            </form>
        </div>
    </div>
</section>
<!-- FORMULARIO PARA LA CATEGORIA ROBOTICA -->
<section class="categorias" id="Robotica">
    <div class="categorias_div">
        <div class="title-categorias">
            <h1>Categoria:Robotica</h1>
            <div class="descargar-formato">
                <p>Recuerda descargar el formato necesario para esta actividad</p>
                <button id="descargar" onclick="descargarArchivoRobotica()">Descargar <img class="icon-descarga" src="./img/downloads.png" alt=""></button>
            </div>
        </div>    
        <div class="formulario">
            <form action="./config/registrarRobotica.php" method="POST" class="form">
                    <div class="coolinput">
                        <label for="categoria" class="text">Categoria de participacion:</label>
                        <select name="categoria" id="categoria" class="select">
                            <option value="">Seleccione una opcion</option>
                            <option value="Robot seguidor de linea">Robot seguidor de linea</option>
                            <option value="Mini sumo">Mini sumo</option>
                            <option value="Futbolero o de servicio">Futbolero o de servicio</option>
                        </select>
                    </div>
                    <div class="coolinput">
                        <label for="InstitucionRobotica" class="text">Institucion:</label>
                        <input type="text" placeholder="Nombre de la Institucion" name="InstitucionRobotica" class="input" id="InstitucionRobotica">
                    </div>
                    <div class="coolinput">
                        <span class="form-title">Nombre completo del participantes o participantes (máx. 2 por categoría)</span>
                    </div>
                    <div class="coolinput">
                        <label for="nombre1" class="text">Nombre del participante:</label>
                        <input type="text" placeholder="..." class="input" id="nombre1" name="nombre1">
                    </div>
                    <div class="coolinput">
                        <label for="Email1" class="text">Email:</label>
                        <input type="email" placeholder="Email del primer participante..." name="Email1" class="input" id="Email1">
                    </div>
                    <div class="coolinput">
                        <label for="contacto1" class="text">Contacto:</label>
                        <input type="text" placeholder="Contacto del primer participante..." name="contacto1" class="input" id="contacto1">
                    </div>
                    <div class="coolinput">
                        <label for="nombre2" class="text">Nombre del participante 2:</label>
                        <input type="text" placeholder="..." class="input" id="nombre2" name="nombre2">
                    </div>
                    <div class="coolinput">
                        <label for="Email2" class="text">Email:</label>
                        <input type="email" placeholder="Email del segundo participante..." name="Email2" class="input" id="Email2">
                    </div>
                    <div class="coolinput">
                        <label for="contacto2" class="text">Contacto:</label>
                        <input type="text" placeholder="Contacto del segundo participante..." name="contacto2" class="input" id="contacto2">
                    </div>
                    <div class="coolinput">
                        <input type="submit" value="Registarme" class="button-registro">
                    </div>
                    
            </form>
        </div>
    </div>
</section>
<script src="./js/registro.js"></script>