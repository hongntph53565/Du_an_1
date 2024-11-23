<?php
class HomeController
{
    public function index()
    {
        view("client/home");
        
    }
    public function dangky()
    {
        view("client/dangky");
    }
    public function dangnhap()
    {
        $error = "";
        if (isset($_POST['submit'])) {
            $ten_tk = $_POST['ten_tk'];
            $mat_khau = $_POST['mat_khau'];
            $user = (new TaiKhoan)->checkUser($ten_tk, $mat_khau);
            // var_dump($user);die;
            if ($user) {
                $_SESSION['ten_tk'] = $ten_tk;
                $_SESSION['mat_khau'] = $mat_khau;
                header("location: index.php?ctl=myacc");
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
            }
        }

        return view("client/dangnhap", compact('error'));
    }
    public function myacc()
    {
        view("client/myacc");
    }
    public function giohang()
    {
        view("client/cart");
    }

    public function categorynu()
    {
        view("client/categorynu");
    }
    public function categorynam()
    {
        view("client/categorynam");
    }
    public function categoryboy()
    {
        view("client/categoryboy");
    }
    public function categorygirl()
    {
        view("client/categorygirl");
    }
}
