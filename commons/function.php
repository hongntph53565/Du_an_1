<?php
function connection()
{
    try {
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";port=" . PORT . ";charset=utf8", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL:" . $e->getMessage();
    }
}

function view($view, $data = [])
{
    extract($data);
    include_once "views/$view.php";
}
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    die;
}
function upload_file($file)
{
    if ($file['size'] > 0) {
        $image = "images/" . $file['name'];
        move_uploaded_file($file['tmp_name'], $image);
        return $image;
    }
    return "";
}
