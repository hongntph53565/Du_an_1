<?php
class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connection();
    }

    // Lấy tất cả sản phẩm
    public function all()
    {
        $sql = "SELECT * FROM san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm mới
    public function insert($data)
    {
        $sql = "INSERT INTO san_pham (ma_dm, ten_sp, gia, so_luong, gia_giam, anh, mo_ta) 
                VALUES (:ma_dm, :ten_sp, :gia, :so_luong, :gia_giam, :anh, :mo_ta)";
        $stmt = $this->conn->prepare($sql);
    
        // Kiểm tra và cung cấp giá trị mặc định nếu thiếu
        $params = [
            'ma_dm'    => $data['ma_dm'] ?? null,
            'ten_sp'   => $data['ten_sp'] ?? null,
            'gia'      => $data['gia'] ?? null,
            'so_luong' => $data['so_luong'] ?? 0, // Giá trị mặc định
            'gia_giam' => $data['gia_giam'] ?? 0, // Giá trị mặc định
            'anh'      => $data['anh'] ?? null,
            'mo_ta'    => $data['mo_ta'] ?? null,
        ];
    
        // Thực thi câu lệnh
        $stmt->execute($params);
    }
    

    // Cập nhật thông tin sản phẩm
    public function update($data, $ma_sp)
    {
        $sql = "UPDATE san_pham 
                SET ma_dm=:ma_dm, ten_sp=:ten_sp, gia=:gia, so_luong=:so_luong, gia_giam=:gia_giam, anh=:anh, mo_ta=:mo_ta 
                WHERE ma_sp=:ma_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_merge($data, ['ma_sp' => $ma_sp]));
    }

    // Lấy thông tin sản phẩm theo mã sản phẩm
    public function findOne($ma_sp)
    {
        $sql = "SELECT * FROM san_pham WHERE ma_sp=:ma_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ma_sp' => $ma_sp]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Xóa sản phẩm
    public function delete($ma_sp)
    {
        $sql = "DELETE FROM san_pham WHERE ma_sp=:ma_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ma_sp' => $ma_sp]);
    }
}
?>
