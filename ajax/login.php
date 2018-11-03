<?php

    require "../config.php";
    require "../misc.php";

    # Check for user and password
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        # Get user and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        # Create connection
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

        # Check connection
        if ($conn)
        {
            # Charset to handle unicode
            $conn->set_charset('utf8mb4');
            mysqli_set_charset($conn, 'utf8mb4');

            # Final username
            $final_user = build_str(clean_str($conn, $username));

            # Final MD5 password
            $final_pass = build_str(str_to_md5($password));

            # Prepare query
            $sql_query = "SELECT * FROM ck_users WHERE userId = ".$final_user." AND password = ".$final_pass." ORDER BY userId";

            # Execute query
            $result = mysqli_query($conn, $sql_query);

            # Check if there were results
            if (mysqli_num_rows($result) > 0)
            {
                # Set cookies
                setcookie('ck_user', $username, time() + (86400 * 30), "/");
                setcookie('ck_pass', str_to_md5($password), time() + (86400 * 30), "/");

                # Return OK
                response(0, 'ok', '');
            }
            else
            {
                # Return invalid login
                response(3, 'Invalid user or password', 'Usuario o contraseña inválidos');
            }

            # Close current connection
            mysqli_close($conn);
        }
        else 
        {
            # Return error response
            response(2, 'Unable to login', 'Error al iniciar sesión');
        }
    }
    else
    {
        # Return error response
        response(1, 'Unable to login', 'Error al iniciar sesión');
    }

?>