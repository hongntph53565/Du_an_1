<?php
class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connection();
    }
    public function all()
    {
        $sql = "SELECT * FROM san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($data)
    {
        $sql = "INSERT INTO san_pham (ma_dm, ten_sp, gia, so_luong, gia_giam, anh, mo_ta) 
                VALUES (:ma_dm, :ten_sp, :gia, :so_luong, :gia_giam, :anh, :mo_ta)";
        $stmt = $this->conn->prepare($sql);
        $params = [
            'ma_dm'    => $data['ma_dm'] ?? null,
            'ten_sp'   => $data['ten_sp'] ?? null,
            'gia'      => $data['gia'] ?? null,
            'so_luong' => $data['so_luong'] ?? 0, 
            'gia_giam' => $data['gia_giam'] ?? 0, 
            'anh'      => $data['anh'] ?? null,
            'mo_ta'    => $data['mo_ta'] ?? null,
        ];
        $stmt->execute($params);
    }
    public function update($data, $ma_sp)
    {
        $sql = "UPDATE san_pham 
                SET ma_dm=:ma_dm, ten_sp=:ten_sp, gia=:gia, so_luong=:so_luong, gia_giam=:gia_giam, anh=:anh, mo_ta=:mo_ta 
                WHERE ma_sp=:ma_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_merge($data, ['ma_sp' => $ma_sp]));
        
    }
    public function findOne($ma_sp)
    {
        $sql = "SELECT * FROM san_pham WHERE ma_sp=:ma_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ma_sp' => $ma_sp]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($ma_sp)
    {
        $sql = "DELETE FROM san_pham WHERE ma_sp=:ma_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ma_sp' => $ma_sp]);
    }
}
?>
