<?php
class CommentController{
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
        $comment = (new Comment)->all();
        view("admin/comment/list", compact('comment'));
    }
    public function delete()
    {
        $cmt_id =$_GET['cmt_id'];
        (new Comment)->delete($cmt_id);
        header('location: index.php?ctl=list-comment');
        
    }
}
?>