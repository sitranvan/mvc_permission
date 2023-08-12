<?php
class DeleteController extends Controller
{
    private $usersModel;
    public function __construct()
    {
        $this->usersModel = $this->loadModel('auth/UsersModel');
    }
    public function index($id)
    {
        $status = $this->usersModel->deleteUser("id='$id'");
        if ($status) {
            Session::flash('msg', 'Xóa người dùng thành công');
            Session::flash('msg_type', 'success');
        } else {
            Session::flash('msg', 'Xóa thất bại, vui lòng thử lại sau');
            Session::flash('msg_type', 'danger');
        }
        Response::redirect('admin/quan-ly-nguoi-dung');
    }
}
