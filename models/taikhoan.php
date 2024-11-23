<?php
class TaiKhoan
{
    public $conn;

    // Hàm khởi tạo để kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connection();
    }

    // Lấy danh sách tài khoản
    public function list()
    {
        $sql = "SELECT * FROM tai_khoan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa tài khoản theo mã
    public function delete($ma_tk)
    {
        $sql = "DELETE FROM tai_khoan WHERE ma_tk=:ma_tk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ma_tk' => $ma_tk]);
        if ($stmt->rowCount() > 0) {
            return "Xóa tài khoản thành công";
        }
        return "Tài khoản không tồn tại hoặc đã bị xóa";
    }

    // Đăng nhập
    public function login($ten_tk, $mat_khau)
    {
        $sql = "SELECT * FROM tai_khoan WHERE ten_tk=:ten_tk AND mat_khau=:mat_khau";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'ten_tk' => $ten_tk,
            'mat_khau' => $mat_khau,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }
        return "Sai tên đăng nhập hoặc mật khẩu";
    }

    // Quên mật khẩu
    public function forgot($email)
    {
        $sql = "SELECT * FROM tai_khoan WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return "Mật khẩu của bạn là: " . $user['mat_khau'];
        }
        return "Email không tồn tại trong hệ thống";
    }
}
?>
