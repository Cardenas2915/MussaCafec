<link rel="stylesheet" href="./css/header.css">
<!-- CABEZERA -->
<header class="header">
    <div class="logos">
        <img src="img/logoSena.svg" alt="">
        <span class="separa-logos"></span>
        <a href="index.php">MUSSA CAFEC</a>
    </div>
    <nav>
        <ul>
        <li><a href="index.php">Inicio</a></li>
        <li id="dropdown">
            <div class="title-dropdown">
                <a id="dropdown-trigger">Participa
                <img id="icon-dropdown" src="./img/row-bottom.png" alt="">
                </a>
            </div>
            <ul id="dropdown-content">
                <li><a href="index.php?vista=informacion">Informacion</a></li>
                <li><a href="index.php?vista=registro">Registrarme</a></li>
            </ul>
        </li>
        <li class=""><a href="index.php?vista=galeria">Galeria</a></li>
        <li><a href="index.php?vista=nosotros">Nosotros</a></li>
        </ul>
    </nav>
    <div class="box-perfil">
        <a href="index.php?vista="><img class="user-icon" src="img/usuario.svg" alt=""></a>
    </div>
</header>
<script src="./js/navbar.js"></script>