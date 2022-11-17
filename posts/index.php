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
        get_posts($con);
        break;
    case "POST":
        create_post($con);
        break;
    case "DELETE":
        delete_post($con, $_GET['id']);
        break;
    default:
        echo "invalid method";
        break;
}

function get_posts($con)
{
    $result = mysqli_query($con, "SELECT * FROM `posts`");

    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $response_code = $row["response_code"];
        $response_desc = $row["response_desc"];
        response($response_code, $response_desc, $json);
        mysqli_close($con);
    } else {
        response(200, "No Record Found", []);
    }
}

function create_post($con)
{
    $json = file_get_contents("php://input");
    $parsed = json_decode($json);

    $body = $parsed->body;
    $created_by = $parsed->created_by;

    $sql =
        "INSERT INTO posts (body, created_by)
	VALUES ('" .
        $body .
        "', " .
        $created_by .
        ")";

    if ($con->query($sql) === true) {
        response(200, "Success");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

function delete_post($con, $id)
{
    $sql = "DELETE FROM posts WHERE id = '" . $id . "'";

    if ($con->query($sql) === TRUE) {
        response(200, 'Success');
    } else {
        response(500, $con->error);
    }
}

?>