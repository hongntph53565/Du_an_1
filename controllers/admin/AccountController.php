<?php
class AccountController
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            // Nếu không phải admin, chuyển hướng về trang đăng nhập hoặc trang lỗi
            header("location: index.php?ctl=login");
            die();
        }
    }
    public function list()
    {
        $account = (new Account)->all();
        view("admin/account/list", compact('account'));
    }

    public function add()
    {
        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;

            if (empty($data['username'])) {
                $errors['username'] = "Tên đăng nhập không được để trống";
            } elseif (strlen($data['username']) < 3) {
                $errors['username'] = "Tên đăng nhập phải có ít nhất 3 ký tự";
            }

            if (empty($data['password'])) {
                $errors['password'] = "Mật khẩu không được để trống";
            } elseif (strlen($data['password']) < 6) {
                $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự";
            }

            if (empty($data['fullname'])) {
                $errors['fullname'] = "Họ và tên không được để trống";
            }

            if (empty($data['email'])) {
                $errors['email'] = "Email không được để trống";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ";
            }

            if (empty($data['phone'])) {
                $errors['phone'] = "Số điện thoại không được để trống";
            } elseif (!preg_match('/^0[0-9]{9}$/', $data['phone'])) {
                $errors['phone'] = "Số điện thoại không hợp lệ";
            }

            if (empty($data['address'])) {
                $errors['address'] = "Địa chỉ không được để trống";
            }

            if (empty($data['role'])) {
                $errors['role'] = "Không được để trống vai trò";
            }


            if (empty($errors)) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $account = new Account();
                try {
                    $account->insert($data);
                    $message = "Thêm mới tài khoản thành công!";
                } catch (Exception $e) {
                    $message = "Lỗi: " . $e->getMessage();
                }
            }
        }

        return view("admin/account/add", compact('message', 'errors'));
    }


    public function delete()
    {
        $acc_id = $_GET['acc_id'];
        (new Account)->delete($acc_id);
        header('location: index.php?ctl=list-account');
    }

    public function edit()
    {
        $message = "";
        $errors = [];
        $acc_id = $_GET['acc_id']; // Lấy id tài khoản từ URL
        $account = (new Account)->find_one($acc_id); // Lấy thông tin tài khoản hiện tại
        
        // Nếu form được submit
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST; // Lấy dữ liệu từ form
            $data['acc_id'] = $acc_id; // Thêm acc_id vào mảng data

            // Kiểm tra các trường cần thiết
            if (!isset($data['fullname'], $data['phone'], $data['email'], $data['role'])) {
                throw new Exception("Thiếu tham số cần thiết để cập nhật tài khoản");
            }

            // Cập nhật tài khoản
            (new Account)->update($data);

            // Hiển thị thông báo thành công và chuyển hướng
            $message = "Cập nhật thành công!";
            header("location: index.php?ctl=list-account");
        }


        // Hiển thị form chỉnh sửa với thông tin tài khoản cũ
        return view("admin/account/edit", compact('account', 'message'));
    }
}
