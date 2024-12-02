<?php 
    class AccountController {
        public function list() {
            $account = (new Account)->all();
            view("admin/account/list", compact('account'));
        }
    
        public function add() {
            $message = ''; // Khởi tạo biến $message
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data = $_POST;
                $data['image'] = upload_file($_FILES['image']);
                (new Account)->insert($data);
                $message = "Thêm mới thành công";
            }
            return view("admin/account/add", compact('message')); // Truyền biến message
        }
    
        public function delete() {
            $acc_id = $_GET['acc_id'];
            (new Account)->delete($acc_id);
            header('location: index.php?ctl=list-account');
        }
    
        public function edit()
        {
            $message = "";
            $acc_id = $_GET['acc_id']; // Lấy id tài khoản từ URL
            $account = (new Account)->find_one($acc_id); // Lấy thông tin tài khoản hiện tại
            
            // Nếu form được submit
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // Lấy dữ liệu từ form
                $data = $_POST;
        
                // Nếu có thay đổi ảnh, tải ảnh mới lên
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $data['image'] = upload_file($_FILES['image']);
                } else {
                    // Nếu không thay đổi ảnh, giữ lại ảnh cũ
                    $data['image'] = $account['image'];
                }
        
                // Thêm acc_id vào mảng data để có thể xác định bản ghi cần cập nhật
                $data['acc_id'] = $acc_id;
        
                // Kiểm tra và đảm bảo tất cả các trường cần thiết có mặt trong mảng $data
                if (!isset($data['fullname'], $data['phone'], $data['email'], $data['birthday'], $data['role'])) {
                    throw new Exception("Thiếu tham số cần thiết để cập nhật tài khoản");
                }
        
                // Cập nhật tài khoản
                (new Account)->update($data);
        
                // Cập nhật thành công
                $message = "Cập nhật thành công!";
                header("location: index.php?ctl=list-account"); // Chuyển hướng sau khi cập nhật
            }
        
            // Hiển thị form chỉnh sửa với thông tin tài khoản cũ
            return view("admin/account/edit", compact('account', 'message'));
        }
        
    }
    
?>