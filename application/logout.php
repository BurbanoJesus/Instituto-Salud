<?php
    session_start();
    $_SESSION["usuario"]= "";
    session_destroy();
    echo "<h1>Información</h1>";
    echo "Sesión Finalizada";
    echo "<br><a href='../home.php'>Ir al Inicio</a>";
    ?>