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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert($data)
    {
        $sql = "INSERT INTO tai_khoan(ma_tk) VALUES (:ma_tk)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($data, $ma_dm)
    {
        $sql = "UPDATE tai_khoan SET ma_tk=:ma_tk WHERE ten_tk=:ten_tk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

     public function findOne($ma_dm)
     {
         $sql = "SELECT * FROM tai_khoan WHERE ma_dm=$ma_dm";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);
     }
 

    public function delete($ma_dm)
    {
        $sql = "DELETE FROM danh_muc WHERE ma_dm=$ma_dm";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

}
?>