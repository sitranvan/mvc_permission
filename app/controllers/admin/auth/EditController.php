<?php
class EditController extends Controller
{
    private $usersModel;
    private $rolesModel;
    private $data;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('auth/UsersModel');
        $this->rolesModel = $this->loadModel('roles/RolesModel');
        $this->data = [];
    }
    public function index($id)
    {
        Session::flash('id_edit', $id);
        $this->data['payload']['errors'] = Session::flash('errors');
        $this->data['payload']['pre_data'] = Session::flash('pre_data');
        $this->data['payload']['msg'] = Session::flash('msg');
        $this->data['payload']['msg_type'] = Session::flash('msg_type');
        $this->data['payload']['allRoles'] = $this->rolesModel->getAllRole();
        $this->data['payload']['dataEdit'] = $this->usersModel->getUser("id='$id'");
        $this->data['title'] = 'Sửa người dùng';
        $this->data['view'] = 'admin/auth/edit';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }
    public function edit()
    {
        $idEdit = Session::flash('id_edit');
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            $validate->fullname();
            $validate->username(true, $idEdit);
            $validate->email(true, $idEdit);
        }
        if (empty($validate->getErrors())) {
            $dataUpdate = [
                'fullname' => $validate->getDataField()['fullname'],
                'username' => $validate->getDataField()['username'],
                'email' => $validate->getDataField()['email'],
                'role_id' => $validate->getDataField()['roles'],
                'update_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->usersModel->updateUser($dataUpdate, "id='$idEdit'");
            if ($status) {
                Session::flash('msg', 'Cập nhật người dùng thành công');
                Session::flash('msg_type', 'success');
            } else {
                Session::flash('msg', 'Cập nhật thất bại, thử lại sau');
                Session::flash('msg_type', 'success');
            }
            Response::redirect('admin/quan-ly-nguoi-dung');
        } else {
            Session::flash('msg_type', 'danger');
            Session::flash('errors', $validate->getErrors());
            Session::flash('pre_data', $validate->getDataField());
        }
        Response::redirect('admin/sua-nguoi-dung/' . $idEdit);
    }
}
