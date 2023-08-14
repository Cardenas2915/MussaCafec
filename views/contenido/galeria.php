<?php require_once('./config/db.php');?>
<link rel="stylesheet" href="./css/galeria.css">
<main>
        <h1>GALERIA</h1>
        <p>Conoce y disfruta los mejores momentos del encuentro de semilleros de investigación SENA</p>
</main>
<?php if(isset($_SESSION['publicacionCreada'] )): ?>
<div class='message-register'>
    <?= $_SESSION['publicacionCreada'] ; ?>
</div>
<?php endif; ?>
<?php if(isset($_SESSION['delete'])): ?>
    <div class='message-error'>
        <?= $_SESSION['delete'] ; ?>
    </div>
<?php endif; ?>

<div class="errores-archivos">
    <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'imagen'):"" ?>
    <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'formato'):"" ?>
</div>
<!-- PANEL ADMINISTRATIVO -->
<?php if(isset($_SESSION['usuario'])): ?>
<section class="form-galeria">
    <h2>Aqui puedes subir nuevo contenido a la galeria</h2>
    <form action="./config/registrar_galeria.php" method="POST" enctype="multipart/form-data">
        <div class="coolinput">
            <label for="titulo" class="text">Titulo:</label>
            <input type="text" placeholder="..." name="titulo" class="input" id="titulo" required>
        </div>
        <div class="coolinput">
            <label for="descripcion" class="text">Descripcion:</label>
            <textarea name="descripcion" required id="descripcion"></textarea>
        </div>
        <div class="coolinput">
            <label for="fecha" class="text">Fecha:</label>
            <input type="date" class="input"  name="fecha" required id="fecha"></input>
        </div>
        <div class="coolinput">
            <span class="form-title">Agrega la imagen que deseas publicar(Recuerda solo debes seleccionar 1 a la vez)</span>
                <br>
            <label for="file-input" class="drop-container">
                <span class="drop-title">Selecciona tu imagen aqui.</span>
                <input type="file" name="imagen" accept="image/*" id="file-input">
            </label>
        </div>
        <div class="coolinput">
            <input type="submit" value="Agregar" class="button-registro">
        </div>
    </form>
</section>
<?php endif; ?>
<!-- MOSTRAR PUBLICACIONES CREADAS -->
<?php
$datosGaleria = objetosGaleria($db);
if(!empty($datosGaleria)):?>
    <section class="gallery">
        <?php while($datos = mysqli_fetch_assoc($datosGaleria)): ?>
        <div class="image">
            <img src="./uploads/<?= $datos['nombre_imagen'];?>" alt="No tiene Imagen">
            <h3><?= $datos['titulo']; ?></h3>
            <p> <?= $datos['descripcion']; ?> </p>
            <span class="date"><?= $datos['fecha']; ?></span>
            <!-- BOTON PARA ELIMINAR LA PUBLICACION -->
            <?php if(isset($_SESSION['usuario'])):?>
                <a href="./config/borrarPublicacion.php?id=<?=$datos['id']?>" type="submit">Eliminar publicacion</a>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </section>
<?php else: ?>
<section class="galeria-vacia">
    <h1>No hay publicaciones para mostrar</h1>
</section>
<?php endif; ?>
<?php BorrarErrores(); ?>