<?php
class Account
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }

    public function all()
    {
        $sql = "SELECT * FROM account";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insert($data)
    {
        $sql = "INSERT INTO account(username, password, fullname, image, email, phone, address, birthday) 
        VALUES (:username, :password, :fullname, :image, :email, :phone, :address, :birthday)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        
    }
public function update($data)
{
    // Tạo câu SQL để cập nhật tài khoản, bao gồm cả vai trò (role)
    $sql = "UPDATE account SET fullname = :fullname, phone = :phone, email = :email, birthday = :birthday, role = :role WHERE acc_id = :acc_id";

    // Chuẩn bị câu lệnh SQL
    $stmt = $this->conn->prepare($sql);

    // Kiểm tra và đảm bảo mảng dữ liệu có đủ thông tin
    if (isset($data['acc_id']) && isset($data['fullname']) && isset($data['phone']) && isset($data['email']) && isset($data['birthday']) && isset($data['role'])) {
        // Thực thi câu lệnh SQL với tham số
        $stmt->execute([
            ':fullname' => $data['fullname'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':birthday' => $data['birthday'],
            ':role' => $data['role'],  // Cập nhật vai trò
            ':acc_id' => $data['acc_id']  // Lưu ý rằng acc_id là tham số bắt buộc để xác định bản ghi cần cập nhật
        ]);
    } else {
        // Nếu thiếu tham số bắt buộc
        throw new Exception("Thiếu tham số cần thiết để cập nhật tài khoản");
    }
}

    public function find_one($acc_id)
    {
        $sql = "SELECT * FROM account WHERE acc_id=$acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($acc_id)
    {
        $sql = "DELETE FROM account WHERE acc_id=$acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function checkUser($username, $password)
    {
        $sql = "SELECT * FROM account WHERE username=:username AND password=:password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}