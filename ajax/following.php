<?php

    require "../config.php";
    require "../misc.php";

    # LLAMADO CON AJAX

    # Esto es llamado desde dashboard.php
    # Primero verifico login (validate.php)
    # Si está OK, devuelvo cartas que sigue el usuario actual
    # Si no está OK, desde dashboard.php hago un reload o algo, o vuelvo a index mostrando un error

?>