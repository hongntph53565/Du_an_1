<?php
class CommentController{
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