<?php
include "../db.php";

function response($response_code = 200, $response_desc = "Success.", $data = "")
{
    $response["code"] = $response_code;
    $response["message"] = $response_desc;

    if ($data) {
        $response["data"] = $data ?? [];
    }

    $json_response = json_encode($response);
    echo $json_response;
}

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        get_posts($con, $_GET['id']);
        break;
    default:
        echo "invalid method";
        break;
}

function get_posts($con, $userId)
{
    $result = mysqli_query($con, "SELECT id, username, avatar_url FROM users WHERE id = '" . $userId . "' LIMIT 1") or die(mysqli_error($con));

    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) > 0) {
        response(200, 'Sucess', $json[0]);
        mysqli_close($con);
    } else {
        response(404, 'Sucess', 'No users found');
    }
}

?>