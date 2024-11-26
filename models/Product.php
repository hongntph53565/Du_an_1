<?php
class Product
{
    public $conn;

    public function __construct()
    {
        $this->conn = connection();
    }
    public function all()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($data)
    {
        $sql = "INSERT INTO product (cate_id, name_pro, price, quantity, sale, image, describe) 
                VALUES (:cate_id, :name_pro, :price, :quantity, :sale, :image, :describe)";
        $stmt = $this->conn->prepare($sql);
        $params = [
            'cate_id'    => $data['cate_id'] ?? null,
            'name_pro'   => $data['name_pro'] ?? null,
            'price'      => $data['price'] ?? null,
            'quantity'   => $data['quantity'] ?? 0,
            'sale'       => $data['sale'] ?? 0,
            'image'      => $data['image'] ?? null,
            'describe'   => $data['describe'] ?? null,
        ];
        $stmt->execute($params);
    }
    public function update($data, $pro_id)
    {
        $sql = "UPDATE product 
                SET cate_id=:cate_id, name_pro=:name_pro, price=:price, quantity=:quantity, sale=:sale, image=:image,describe=:describe
                WHERE pro_id=:pro_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_merge($data, ['pro_id' => $pro_id]));
    }
    public function findOne($pro_id)
    {
        $sql = "SELECT * FROM product WHERE pro_id=:pro_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pro_id' => $pro_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($pro_id)
    {
        $sql = "DELETE FROM product WHERE pro_id=:pro_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pro_id' => $pro_id]);
    }

    public function getProductInCategory($cate_id)
    {
        $sql = "SELECT * FROM product WHERE cate_id=:cate_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['cate_id' => $cate_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}