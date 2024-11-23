<?php
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }

    public function all()
    {
        $sql = "SELECT * FROM tai_khoan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function checkUser($ten_tk, $mat_khau){
        $sql = "SELECT * FROM tai_khoan WHERE ten_tk=:ten_tk AND mat_khau=:mat_khau";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ten_tk'=>$ten_tk, 'mat_khau' => $mat_khau]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>