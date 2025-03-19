<?php
class Account
{
    private $conn;

    public function __construct()
    {
        $this->conn = connection();
        if (!$this->conn) {
            throw new Exception("Không thể kết nối cơ sở dữ liệu");
        }
    }

    // Lấy tất cả tài khoản
    public function all()
    {
        $sql = "SELECT * FROM account";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm tài khoản mới
    public function insert($data)
    {
        $sql = "INSERT INTO account (username, password, fullname, email, phone, address) 
                VALUES (:username, :password, :fullname, :email, :phone, :address)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':username' => $data['username'],
            ':password' => $data['password'],
            ':fullname' => $data['fullname'],
            ':email'    => $data['email'],
            ':phone'    => $data['phone'],
            ':address'  => $data['address']
        ]);
    }

    // Cập nhật tài khoản
    public function update($data)
    {
        $sql = "UPDATE account 
                SET fullname = :fullname, phone = :phone, email = :email, role = :role 
                WHERE acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':fullname' => $data['fullname'],
            ':phone'    => $data['phone'],
            ':email'    => $data['email'],
            ':role'     => $data['role'],
            ':acc_id'   => $data['acc_id']
        ]);
    }
    

    // Tìm 1 tài khoản theo ID
    public function find_one($acc_id)
    {
        $sql = "SELECT * FROM account WHERE acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $acc_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Xóa tài khoản
    public function delete($acc_id)
    {
        // Xóa các bản ghi liên quan trong bảng cart
        $sql = "DELETE FROM cart WHERE acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $acc_id]);
    
        // Sau đó mới xóa tài khoản trong bảng account
        $sql = "DELETE FROM account WHERE acc_id = :acc_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':acc_id' => $acc_id]);
    }
    

    // Kiểm tra người dùng
    public function checkUser($username)
    {
        $sql = "SELECT * FROM account WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
