<?php
class DeleteController extends Controller
{
    private $rolesModel;
    public function __construct()
    {
        $this->rolesModel = $this->loadModel('roles/RolesModel');
    }
    public function index($id)
    {
        $status = $this->rolesModel->deleteRole("id='$id'");
        if ($status) {
            Session::flash('msg', 'Xóa vai trò thành công');
            Session::flash('msg_type', 'success');
        } else {
            Session::flash('msg', 'Xóa thất bại, vui lòng thử lại sau');
            Session::flash('msg_type', 'danger');
        }
        Response::redirect('admin/quan-ly-vai-tro');
    }
}
