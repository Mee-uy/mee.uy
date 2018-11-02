<?php

    require "../config.php";
    require "../misc.php";

    # LLAMADO CON AJAX

    # Esto es llamado desde index.php
    # Intenta loguearse con los parámetros recibidos en POST
    # Si login está OK, genero cookie para guardar usuario y contrasena en MD5 y devuelvo JSON OK
    # Si login no está OK, no genero nada y devuelvo error en JSON

?>

login