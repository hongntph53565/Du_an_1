<?php
class AuthController
{
    public function register()
    {
        $categories = (new Category)->getParentCategory();
        $errors = [
            'fullname' => '',
            'username' => '',
            'password' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if (empty($fullname)) {
                $errors['fullname'] = 'Không được bỏ trống họ tên.';
            }
            if (empty($username)) {
                $errors['username'] = 'Không được bỏ trống tên tài khoản.';
            }
            if (empty($password)) {
                $errors['password'] = 'Mật khẩu là bắt buộc.';
            }
            if (empty($email)) {
                $errors['email'] = 'Không được để trống email.';
            }
            if (empty($phone)) {
                $errors['phone'] = 'Không được để trống số điện thoại.';
            } elseif (!preg_match('/^0[0-9]{9}$/', $phone)) {
                $errors['phone'] = 'Số điện thoại không hợp lệ. Vui lòng nhập lại số điện thoại.';
            }
            if (empty($address)) {
                $errors['address'] = 'Không được để trống địa chỉ.';
            }
            if (empty($errors['username']) && empty($errors['password'])) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $data['password'] = $password;
                (new Account)->insert($data);
                header("Location: " . BASE_URL . "?ctl=login");
                die;
            }
        }
        return view("client/register", compact('categories', 'errors'));
    }


    public function login()
    {
        if (isset($_SESSION['user'])) {
            header("Location: index.php?ctl=myaccount");
            die;
        }
        $errors = [
            'username' => '',
            'password' => '',
        ];

        $categories = (new Category)->getParentCategory();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');
            if (empty($username)) {
                $errors['username'] = 'Không được bỏ trống tên tài khoản.';
            }
            if (empty($password)) {
                $errors['password'] = 'Không được để trống mật khẩu';
            }
            if (empty($errors['username']) && empty($errors['password'])) {
                $user = (new Account)->checkUser($username);

                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user'] = $user;
                        if (!isset($_SESSION['user'])) {
                            header("Location: index.php?ctl=login");
                            die;
                        } else {
                            header("location: index.php?ctl=myaccount");
                            exit;
                        }
                    } else {
                        $errors['password'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
                    }
                } else {
                    $errors['password'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
                }
            }
        }

        return view("client/login", compact('errors', 'categories'));
    }

    public function myaccount()
    {

        $errors = [
            'fullname' => '',
            'phone' => '',
            'email' => '',
        ];
        $user = $_SESSION['user'];
        $acc_id = $user['acc_id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            if (empty($fullname)) {
                $errors['fullname'] = 'Không được bỏ trống tên tài khoản.';
            }
            if (empty($phone)) {
                $errors['phone'] = 'Không được để trống số điện thoại';
            } elseif (!preg_match('/^0[0-9]{9}$/', $data['phone'])) {
                $errors['phone'] = "Số điện thoại không hợp lệ";
            }
            if (empty($email)) {
                $errors['email'] = 'Không được để trống email';
            }
            if (empty($errors['fullname']) && empty($errors['phone']) && empty($errors['email'])) {
                $data['role'] = 0;
                (new Account)->update($data);
            }
        }
        $account = (new Account)->find_one($acc_id);
        $categories = (new Category)->getParentCategory();

        return view("client/myaccount", compact('categories', 'account', 'errors', 'user'));
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("location: index.php");
    }
}
