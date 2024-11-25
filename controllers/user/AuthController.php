<?php
class AuthController
{
    public function register()
    {
        $categories = (new Category)->getParentCategory();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $data['image'] = upload_file($_FILES['image']);
            (new Account)->insert($data);
            $message = "Thêm mới thành công";
        }
        return view("client/register", compact('categories'));
    }
    public function login()
    {
        $error = "";
        $categories = (new Category)->getParentCategory();
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = (new Account)->checkUser($username, $password);
            if ($user) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("location: index.php?ctl=myaccount");
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
            }
        }
        return view("client/login", compact('error', 'categories'));
    }
    public function myaccount()
    {
        $categories = (new Category)->getParentCategory();
        view("client/myaccount", compact('categories'));
    }
}
