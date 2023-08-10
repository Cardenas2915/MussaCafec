<link rel="stylesheet" href="./css/registro.css">
<main>
    <div class="main">
        <h1>Formularios de Registro para el VI Encuentro de Semilleros de Investigación SENA</h1>
        <p>Busca tu categoria da click, inscribete y participa</p>
    </div>
    <div class="submenu-nav">
        <a href="">Ponente</a>
        <a href="">Poster</a>
        <a href="">Feria empresarial</a>
        <a href="">Torneo de robotica</a>
    </div>
</main>
<section>
    <div class="categorias-ponente">
        <div>
            <h1>Categoria:"Ponente"</h1>
        </div>    
        <div class="formulario">
            <form action="" method="POST" class="form-ponente">
                    <div class="coolinput">
                        <label for="eje" class="text">Eje tematico:</label>
                        <input type="text" placeholder="..." name="ejeTematico" class="input" id="eje">
                    </div>
                    <div class="coolinput">
                        <label for="Institucion" class="text">Institución de participación:</label>
                        <select id="Institucion" class="select" onchange="mostrar()">
                            <option value="">Seleccione una opcion</option>
                            <option value="SENA">SENA</option>
                            <option value="Externa">Externa</option>
                        </select>
                    </div>
                    <div class="mostrar-input-eterna">
                        <div class="coolinput">
                            <label for="externa" class="text">Externa:</label>
                            <input type="text" placeholder="..." name="externa" class="input" id="externa">
                        </div>
                    </div>
                    <div class="mostrar-input-sena">
                        <div class="coolinput">
                            <label for="titulada" class="text">Titulada:</label>
                            <input type="text" placeholder="..." name="titulada" class="input" id="titulada">
                        </div>

                        <div class="coolinput">
                            <label for="ficha" class="text">Ficha:</label>
                            <input type="text" placeholder="..." name="ficha" class="input" id="ficha">
                        </div>
                    </div>
                    <div class="coolinput">
                        <label for="Ponentes" class="text">Numero de ponentes:</label>
                        <select id="Ponentes" class="select">
                            <option value="">Seleccione una opcion</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
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
                            documento en power point o pdf con la presentación del proyecto.</span>
                        <label for="file-input" class="drop-container">
                            <span class="drop-title">Arrastra tus archivos aqui.</span>
                            O seleccionalos
                            <input type="file" accept=".pdf" id="file-input">
                            <input type="file" accept=".docx" id="file-input">
                        </label>
                    </div>
            </form>
        </div>
    </div>
</section>