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
        signup($con);
        break;
    default:
        echo "invalid method";
        break;
}

function signup($con)
{
    $json = file_get_contents("php://input");
    $parsed = json_decode($json);

    $password = $parsed->password;
    $avatar = $parsed->avatar;
    $username = $parsed->username;

    if (!isset($password) || !isset($avatar) || !isset($username)) {
        response(400, 'Missing fields password, avatar or username');
    }

    // Check if user exists
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE username = '" . $username . "' AND password = '" . $password . "'");

    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        response(500, 'Usuario ya existe');
        mysqli_close($con);
    }

    // Create user

    $sql = "INSERT INTO users (username, avatar_url, password) VALUES ('" . $username . "', '" . $avatar . "', '" . $password . "')";


    if ($con->query($sql) === TRUE) {
        response(200, 'Success', 'New user created');
    } else {
        response(505, "Error", $con->error);
    }
}

?>