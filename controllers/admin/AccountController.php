<?php 
class AccountController{
    public function list()
    {
        $account = (new Account)->all();
        view("admin/account/list", compact('account'));
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $data['image'] = upload_file($_FILES['image']);
            (new Account)->insert($data);
            $message = "Thêm mới thành công";
        }
        return view("admin/account/add");
    }
    public function delete()
    {
        $acc_id = $_GET['acc_id'];
        (new Account)->delete($acc_id);
        header('location: index.php?ctl=list-account');
    }
}
?>