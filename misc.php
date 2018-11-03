<?php
    # Build JSON response
    function response($status, $status_message, $data)
    {
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;

        $json_response = json_encode($response);

        echo $json_response;
    }

    # Return cleaned up string for SQL
    function clean_str($conn, $string)
    {
        return mysqli_real_escape_string($conn, $string);
    }

    # Return valid SQL string
    function build_str($string)
    {
        return "'".$string."'";
    }

    # Return MD5 string
    function str_to_md5($string)
    {
        return md5($string);
    }

    # Validates current user session (user/pass cookie and db check)
    # Returns either a connection or false
    function validate($host_db, $user_db, $pass_db, $name_db)
    {
        if (!isset($_COOKIE["ck_user"]) || !isset($_COOKIE["ck_pass"])) {
            # Don't check in db and return false inmediatly
            return false;
        }
        else
        {
            # Get session cookies
            $username = $_COOKIE["ck_user"];
            $password = $_COOKIE["ck_pass"];

            # Create connection
            $conn = mysqli_connect($host_db, $user_db, $pass_db, $name_db);

            # Check connection
            if ($conn)
            {
                # Charset to handle unicode
                $conn->set_charset('utf8mb4');
                mysqli_set_charset($conn, 'utf8mb4');

                # Final username
                $final_user = build_str(clean_str($conn, $username));

                # Final MD5 password
                $final_pass = build_str($password);

                # Prepare query
                $sql_query = "SELECT * FROM ck_users WHERE userId = ".$final_user." AND password = ".$final_pass." ORDER BY userId";

                # Execute query
                $result = mysqli_query($conn, $sql_query);

                # Check if there were results
                if (mysqli_num_rows($result) > 0)
                {
                    # OK - Return connection
                    return $conn;
                }
                else
                {
                    # Delete invalid cookies
                    unset($_COOKIE['ck_user']);
                    $res = setcookie('ck_user', '', time() - 3600);
                    unset($_COOKIE['ck_pass']);
                    $res = setcookie('ck_pass', '', time() - 3600);

                    # Close current connection
                    mysqli_close($conn);

                    # Return false. Incorrect login or password changed
                    return false;
                }
            }
            else 
            {
                # Unexpected error
                return false;
            }
        }
    }
?>