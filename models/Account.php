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
        $sql = "INSERT INTO account(username, password, fullname, image, email, phone, address, birthday, cre_date, role) 
        VALUES (:username, :password, :fullname, :image, :email, :phone, :address, :birthday, :cre_date, :role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
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
