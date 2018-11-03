<?php

    require "../config.php";
    require "../misc.php";

    # Validates current user session
    $conn = validate($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    # OK if returned a valid connection
    if ($conn)
    {
        # Hacer acá
        echo "OK, dashboard";

        # Close current connection
        mysqli_close($conn);
    }
    else {
        # Move to index
        header("Location: ".$MAIN_URL);
        die();
    }

?>