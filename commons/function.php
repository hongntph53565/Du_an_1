<?php 
    function connection(){
        try{
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";port=" . PORT . ";charset=utf8", USERNAME, PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Lỗi kết nối CSDL:" . $e->getMessage();
        }
    }

    function view($view, $data = []){
        extract($data);
        include_once "views/$view.php";
    }
?>