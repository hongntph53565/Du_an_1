<?php
class AccountController
{
    // Hiển thị danh sách tài khoản
    public function list()
    {
        $taiKhoan = new TaiKhoan();
        $accounts = $taiKhoan->list();
        view("admin/taikhoan/list", ['accounts' => $accounts]);
    }

    // Xóa tài khoản
    public function delete()
    {
        $ma_tk = $_GET['ma_tk'] ?? null;
        if ($ma_tk) {
            $taiKhoan = new TaiKhoan();
            $result = $taiKhoan->delete($ma_tk);
            $_SESSION['message'] = $result;
        }
        header("Location: index.php?ctl=list-account");
    }

    // Đăng nhập
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_tk = $_POST['ten_tk'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? null;

            if ($ten_tk && $mat_khau) {
                $taiKhoan = new TaiKhoan();
                $user = $taiKhoan->login($ten_tk, $mat_khau);
                if (is_array($user)) {
                    $_SESSION['user'] = $user;
                    header("Location: index.php?ctl=dashboard");
                } else {
                    $_SESSION['error'] = $user;
                }
            }
        }
        view("auth/login", ['error' => $_SESSION['error'] ?? null]);
    }

    // Quên mật khẩu
    public function forgot()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'] ?? null;
            if ($email) {
                $taiKhoan = new TaiKhoan();
                $result = $taiKhoan->forgot($email);
                $_SESSION['message'] = $result;
            }
        }
        view("auth/forgot", ['message' => $_SESSION['message'] ?? null]);
    }
}
?>
