<?php
if(!isset($_SESSION['usuario'])){
    header('location:index.php');
}
require_once('./config/db.php');
?> 
<link rel="stylesheet" href="./css/admin.css">

<?php $totalPonentes = obtenerRegistros($db,'ponentes','id'); ?>
<?php $totalPoster = obtenerRegistros($db,'poster','id'); ?>
<?php $totalferia = obtenerRegistros($db,'feria_empresarial','id'); ?>
<?php $totalRobotica = obtenerRegistros($db,'robotica','id'); ?>
<main>
    <a href="#ponencia">
        <h2>Ponentes</h2>
        <p><?=$totalPonentes;?> Registrados</p>
    </a>
    <a href="#poster">
        <h2>Poster</h2>
        <p><?=$totalPoster;?> Registrados</p>
    </a>
    <a href="#feria">
        <h2>Feria empresarial</h2>
        <p><?=$totalferia;?> Registrados</p>
    </a>
    <a href="#robotica">
        <h2>Robotica</h2>
        <p><?=$totalRobotica;?> Registrados</p>
    </a>
</main>
<?php if(isset($_SESSION['delete'])): ?>
    <div class='message-error'>
        <?= $_SESSION['delete'] ; ?>
    </div>
<?php endif; ?>
<section id="ponencia">
<?php $resultado = obtenerDatos($db,'ponentes');
    if(mysqli_num_rows($resultado)>0): //se verifica si datos seleccionados?>    
    <div class="titulo-cont"><h1>Ponencias Registradas</h1></div>
    <div class="buscadores">
        <div class="checkbox">
            <p>Filtrar por institucion:</p>
            <input type="checkbox" id="filtroSena" name="filtroTipo" value="SENA" class="check">
            <label for="filtroSena">SENA</label>
            <input type="checkbox" id="filtroExterna" name="filtroTipo" value="Externa" class="check">
            <label for="filtroExterna">Externa</label>
        </div>
        <div class="coolinput">
            <input type="text" id="busquedaInput" placeholder="Buscar por Título" class="input">
        </div>
    </div>
    
    <div class="resultados">
        <?php 
        
        while($datos = mysqli_fetch_array($resultado)):  ?>
            <div class="proyectos">
                <div>
                    <div class="datos">
                        <h3>Titulo de Proyecto</h3>
                        <p id="titulo"><?= $datos['titulo_proyecto']?></p>
                    </div>
                    <div class="datos">
                        <h3>Eje tematico</h3>
                        <p><?= $datos['eje_tematico']?></p>
                    </div>
                    <div class="datos">
                        <h3>Tipo de Institucion</h3>
                        <p id="tipo"><?= $datos['tipo_Institucion']?></p>
                    </div>
                    <?php if($datos['tipo_Institucion'] == 'SENA'): ?>
                    <div class="datos">
                        <h3>Titulada</h3>
                        <p><?= $datos['titulada']?></p>
                    </div>
                    <div class="datos">
                        <h3>Ficha</h3>
                        <p><?= $datos['ficha']?></p>
                    </div>
                    <?php else: ?>
                        <div class="datos">
                        <h3>Nombre de la insitucion</h3>
                        <p><?= $datos['institucion']?></p>
                    </div>
                    <?php endif; ?>
                    <div class="datos">
                        <h3>Nombre ponente</h3>
                        <p><?= $datos['ponente_1']?></p>
                    </div>
                    <div class="datos">
                        <h3>Email ponente</h3>
                        <p><?= $datos['correo_1']?></p>
                    </div>
                    <div class="datos">
                        <h3>Contacto ponente</h3>
                        <p><?= $datos['contacto_1']?></p>
                    </div>
                    <?php if(!empty($datos['ponente_2'])): ?>
                        <div class="datos">
                        <h3>Nombre ponente 2</h3>
                        <p><?= $datos['ponente_2']?></p>
                    </div>
                    <div class="datos">
                        <h3>Email ponente 2</h3>
                        <p><?= $datos['correo_2']?></p>
                    </div>
                    <div class="datos">
                        <h3>Contacto ponente 2</h3>
                        <p><?= $datos['contacto_2']?></p>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($datos['ponente_3'])): ?>
                        <div class="datos">
                        <h3>Nombre ponente 3</h3>
                        <p><?= $datos['ponente_3']?></p>
                    </div>
                    <div class="datos">
                        <h3>Email ponente 3</h3>
                        <p><?= $datos['correo_3']?></p>
                    </div>
                    <div class="datos">
                        <h3>Contacto ponente 3</h3>
                        <p><?= $datos['contacto_3']?></p>
                    </div>
                    <?php endif; ?>
                    <div class="datos">
                        <h3>Archivo para expocision</h3>
                        <a href="./resources/ponentes/<?= $datos['archivo_1']?>" download><?= $datos['archivo_1']?></a>
                    </div>
                    <div class="datos">
                        <h3>archivo de informacion</h3>
                        <a href="./resources/ponentes/<?= $datos['archivo_2']?>" download><?= $datos['archivo_2']?></a>
                    </div>
                    <div class="datos">
                        <a href="./config/borrarPonente.php?id=<?=$datos['id']?>" class="delete">Eliminar registro</a>
                    </div>
                </div>
                <br>
            </div>
        <?php endwhile; ?>  
    </div>
<?php else: //si no se encontraron datos en la busqueda ?>
    <div class="sin-registros">
                <h3>Lo sentimos!</h3>
                <p>En el momento no hay ninguna ponencia registrada</p>
    </div>
<?php endif; ?>
</section>

<section id="poster">
<?php $resultadoPoster = obtenerDatos($db,'poster');
    if(mysqli_num_rows($resultadoPoster)>0): //se verifica si datos seleccionados?>    
    <div class="titulo-cont"><h1>Poster registrados</h1></div>
    <div class="buscadores">
        <div class="coolinput">
            <input type="text" id="buscador" placeholder="Buscar por título" class="input">
        </div>
    </div> 
    <div class="resultado-de-busqueda">
        <?php  
        while($datosPoster = mysqli_fetch_array($resultadoPoster)): ?>
            <div class="proyectos">
                <div>
                    <div class="datos">
                        <h3>Titulo de Proyecto</h3>
                        <p id="titulo"><?= $datosPoster['titulo']?></p>
                    </div>
                    <div class="datos">
                        <h3>Institucion</h3>
                        <p><?= $datosPoster['institucion']?></p>
                    </div>
                    <div class="datos">
                        <h3>Nombre ponente</h3>
                        <p><?= $datosPoster['nombre_participante_1']?></p>
                    </div>
                    <div class="datos">
                        <h3>Email ponente</h3>
                        <p><?= $datosPoster['correo_participante_1']?></p>
                    </div>
                    <div class="datos">
                        <h3>Contacto ponente</h3>
                        <p><?= $datosPoster['contacto_participante_1']?></p>
                    </div>
                    <?php if(!empty($datosPoster['nombre_participante_2'])): ?>
                        <div class="datos">
                        <h3>Nombre ponente 2</h3>
                        <p><?= $datosPoster['nombre_participante_2']?></p>
                    </div>
                    <div class="datos">
                        <h3>Email ponente 2</h3>
                        <p><?= $datosPoster['correo_participante_2']?></p>
                    </div>
                    <div class="datos">
                        <h3>Contacto ponente 2</h3>
                        <p><?= $datosPoster['contacto_participante_2']?></p>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($datosPoster['nombre_participante_3'])): ?>
                        <div class="datos">
                        <h3>Nombre ponente 3</h3>
                        <p><?= $datosPoster['nombre_participante_3']?></p>
                    </div>
                    <div class="datos">
                        <h3>Email ponente 3</h3>
                        <p><?= $datosPoster['correo_participante_3']?></p>
                    </div>
                    <div class="datos">
                        <h3>Contacto ponente 3</h3>
                        <p><?= $datosPoster['contacto_participante_3']?></p>
                    </div>
                    <?php endif; ?>
                    <div class="datos">
                        <h3>archivo de informacion</h3>
                        <a href="./resources/poster/<?= $datosPoster['archivo']?>" download><?= $datosPoster['archivo']?></a>
                    </div>
                    <div class="datos">
                        <a href="./config/borrarPoster.php?id=<?=$datosPoster['id']?>" class="delete">Eliminar registro</a>
                    </div>
                </div>
                <br>
            </div>
        <?php endwhile; ?>  
    </div>
<?php else: //si no se encontraron datos en la busqueda ?>
    <div class="sin-registros">
                <h3>Lo sentimos!</h3>
                <p>En el momento no hay ningun poster registrado</p>
    </div>
<?php endif; ?>
</section>

<section id="feria">
<?php $resultadoFeria = obtenerDatos($db,'feria_empresarial');
    if(mysqli_num_rows($resultadoFeria)>0): //se verifica si datos seleccionados?>    
    <div class="titulo-cont"><h1>Proyectos de feria empresarial registrados</h1></div>
    <div class="buscadores">
        <div class="coolinput">
            <input type="text" id="buscadorFeria" placeholder="Buscar por título" class="input">
        </div>
    </div>
<div class="resultadoFeria">
    <?php  
    while($datosFeria = mysqli_fetch_array($resultadoFeria)): ?>
        <div class="proyectosFeria">
            <div>
                <div class="datos">
                    <h3>Nombre de la institucion</h3>
                    <p><?= $datosFeria['institucion']?></p>
                </div>
                <div class="datos">
                    <h3>Numero de Participantes</h3>
                    <p><?= $datosFeria['participantes']?></p>
                </div>
                <div class="datos">
                    <h3>Titulo de proyecto</h3>
                    <p id="titulo_feria"><?= $datosFeria['titulo_proyecto']?></p>
                </div>
                <div class="datos">
                    <a href="./config/borrarFeria.php?id=<?=$datosFeria['id']?>" class="delete">Eliminar registro</a>
                </div>
            </div>
            <br>
        </div>
    <?php endwhile; ?>  
</div>
<?php else: //si no se encontraron datos en la busqueda ?>
    <div class="sin-registros">
                <h3>Lo sentimos!</h3>
                <p>En el momento no hay ninguna feria registrada</p>
    </div>
<?php endif; ?>
</section>

<section id="robotica">
<?php $resultadoRobotica = obtenerDatos($db,'robotica');
    if(mysqli_num_rows($resultadoRobotica)>0): //se verifica si datos seleccionados?>    
    <div class="titulo-cont"><h1>Proyectos de robotica registrados</h1></div>
    <div class="buscadores">
        
    <div class="checkbox">
                <label>
                    <input type="checkbox" class="categoria-checkbox" value="Robot seguidor de linea">
                    Robot Seguidor de Línea
                </label>
                <label>
                    <input type="checkbox" class="categoria-checkbox" value="Mini sumo">
                    Mini Sumo
                </label>
                <label>
                    <input type="checkbox" class="categoria-checkbox" value="Futbolero o de servicio">
                    Futbolero o de Servicio
                </label>
            </div>

            <div class="coolinput">
                <input type="text" id="buscadorR" placeholder="Buscar por Institucion" class="input">
            </div>
    </div>
<div class="resultadoRobotica">
    <?php  
    while($datosR = mysqli_fetch_array($resultadoRobotica)): ?>
        <div class="proyectosRobotica">
            <div>
                <div class="datos">
                    <h3>Categoria</h3>
                    <p class="categoria"><?= $datosR['categoria']?></p>
                </div>
                <div class="datos">
                    <h3>Nombre de la institucion</h3>
                    <p class="institucionR"><?= $datosR['institucion']?></p>
                </div>
                <div class="datos">
                    <h3>Nombre del participante</h3>
                    <p ><?= $datosR['nombre_participante_1']?></p>
                </div>
                <div class="datos">
                    <h3>Email del participante</h3>
                    <p ><?= $datosR['correo_participante_1']?></p>
                </div>
                <div class="datos">
                    <h3>Contacto del participante</h3>
                    <p ><?= $datosR['contacto_participante_1']?></p>
                </div>
                <?php if(!empty($datosR['nombre_participante_2'])): ?>
                <div class="datos">
                    <h3>Nombre del participante 2</h3>
                    <p ><?= $datosR['nombre_participante_2']?></p>
                </div>
                <div class="datos">
                    <h3>Email del participante 2</h3>
                    <p ><?= $datosR['correo_participante_2']?></p>
                </div>
                <div class="datos">
                    <h3>Contacto del participante 2</h3>
                    <p ><?= $datosR['contacto_participante_2']?></p>
                </div>
                <div class="datos">
                    <a href="./config/borrarRobotica.php?id=<?=$datosR['id']?>" class="delete">Eliminar registro</a>
                </div>
                <?php endif; ?>
            </div>
            <br>
        </div>
    <?php endwhile; ?>  
</div>
<?php else: //si no se encontraron datos en la busqueda ?>
    <div class="sin-registros">
                <h3>Lo sentimos!</h3>
                <p>En el momento no hay ningun royecto de robotica registrado</p>
    </div>
<?php endif; ?>
</section>
<?php //BorrarErrores(); ?>
<script src="./js/reportes.js"></script>
<script src="./js/buscadorPonente.js"></script>
<script src="./js/buscadorPoster.js"></script>
<script src="./js/buscadorFeria.js"></script>
<script src="./js/buscadorRobotica.js"></script>