<?php

include "../db.php";

function response($response_code = 200, $response_desc = "Success.", $data = "")
{
    http_response_code($response_code);
    $response["code"] = $response_code;
    $response["message"] = $response_desc;

    if ($data) {
        $response["data"] = $data;
    }

    $json_response = json_encode($response);
    echo $json_response;
}



$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "POST":
        login($con);
        break;
    default:
        echo "invalid method";
        break;
}

function login($con)
{
    $json = file_get_contents("php://input");
    $parsed = json_decode($json);

    $username = $parsed->username;
    $password = $parsed->password;

    $result = mysqli_query($con, "SELECT id, username, avatar_url FROM `users` WHERE username = '" . $username . "' AND password = '" . $password . "' LIMIT 1");

    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        response(200, 'Success', $json[0]);
        mysqli_close($con);
    } else {
        response(404, "Usuario o contraseña incorrectos");
    }
}

?>