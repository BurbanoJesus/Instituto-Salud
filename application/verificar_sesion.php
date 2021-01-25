<?php 
    session_start(); 
    function verificar(){
    if (!isset($_SESSION['usuario'])){
        echo "<div class='session_non'>";
        echo "<p>Sesión No Inicializada</p>";
        echo "<a href='/instituto/index.php'>Ir al Inicio</a>";
        echo "</div>";
        return false;
    }
    if ($_SESSION['usuario'] == "" ){
        echo "<div class='session_non'>";
        echo "<p>Sesion Finalizada !!</p>";
        echo "<a href='/instituto/index.php'>Ir al Inicio</a>";
        echo "</div>";
        return false;
    }
    return true;
    }
?>