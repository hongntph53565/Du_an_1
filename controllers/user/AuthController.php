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
                // $_SESSION['username'] = $username;
                // $_SESSION['password'] = $password;
                $_SESSION['user'] = $user;
                header("location: index.php?ctl=myaccount");
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
            }
        }
        if (isset($_SESSION['user'])) {
            header("location: index.php?ctl=myaccount");
            exit;
        }
        return view("client/login", compact('error', 'categories'));
    }
    public function myaccount()
    {
        $user = $_SESSION['user'];
        $acc_id = $user['acc_id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            // var_dump($data); 
            (new Account)->update($data);
        }
        $account = (new Account)->find_one($acc_id);
        $categories = (new Category)->getParentCategory();
        
        return view("client/myaccount", compact('categories', 'account'));
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("location: index.php");
    }
}
