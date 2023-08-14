<link rel="stylesheet" href="./css/header.css">

<!-- CABEZERA -->
<nav class="navbar">
        <div class="logos">
            <img src="img/logoSena.svg" alt="">
            <span class="separa-logos"></span>
            <a href="index.php">MUSSA CAFEC</a>
        </div>
        <div class="menu-toggle" id="mobile-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-list" id="nav-list">
            <li><a href="index.php?vista=informacion">Información</a></li>
            <li><a href="index.php?vista=registro">Participar</a></li>
            <li><a href="index.php?vista=galeria">Galería</a></li>
            <li><a href="index.php?vista=nosotros">Nosotros</a></li>
            <?php if(isset($_SESSION['usuario'])): ?>
                <li><a href="index.php?vista=administrador">Reportes</a></li>
                <li><a href="./config/logout.php">Cerrar sesion</a></li>
            <?php else : ?>
                <li><a href="index.php?vista=login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <?php if(isset($_SESSION['usuario'])): ?>
        <p class="admin-text">Estas como administrador</p>
    <?php endif; ?>

<script src="./js/navbar.js"></script>