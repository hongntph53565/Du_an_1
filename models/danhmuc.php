<?php
class DanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }

    public function all()
    {
        $sql = "SELECT * FROM danh_muc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParentCategory()
    {
        $sql = "SELECT * FROM danh_muc WHERE parent_id IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($data)
    {
        $sql = "INSERT INTO danh_muc(ten_dm) VALUES (:ten_dm)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function update($data, $ma_dm)
    {
        $sql = "UPDATE danh_muc SET ten_dm=:ten_dm WHERE ma_dm=:ma_dm";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function findOne($ma_dm)
    {
        $sql = "SELECT * FROM danh_muc WHERE ma_dm=$ma_dm";
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
