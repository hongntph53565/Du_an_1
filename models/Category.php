<?php
class Category
{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }

    public function all()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParentCategory()
    {
        $sql = "SELECT * FROM category WHERE parent_id IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChildrenByParent($parent_id)
    {
        $sql = "SELECT * FROM category WHERE parent_id=:parent_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':parent_id' => $parent_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($data)
    {
        $sql = "INSERT INTO category(cate_name, parent_id) VALUES (:cate_name, :parent_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function update($data, $cate_id)
    {
        $sql = "UPDATE category SET cate_name=:cate_name WHERE cate_id=:cate_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function findOne($cate_id)
    {
       $sql = "SELECT * FROM category WHERE cate_id = :cate_id";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute([':cate_id' => $cate_id]);
       return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    


    public function delete($cate_id)
    {
        $sql = "DELETE FROM category WHERE cate_id=$cate_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
