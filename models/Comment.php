<?php 
class Comment{
    public $conn;
    public function __construct()
    {
        $this->conn = connection();
    }

    public function all()
    {
        $sql = "SELECT * FROM comment ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($cmt_id)
    {
        $sql = "DELETE FROM comment WHERE cmt_id=$cmt_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function find_one($pro_id)
    {
        $sql = "SELECT * FROM comment WHERE pro_id=:pro_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pro_id' => $pro_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>