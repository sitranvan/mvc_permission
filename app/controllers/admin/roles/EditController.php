<?php
class EditController extends Controller
{
    private $data;
    private $rolesModel;
    public function __construct()
    {
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
        $this->data['payload']['dataEdit'] = $this->rolesModel->getRole("id='$id'");
        $this->data['title'] = 'Sửa vai trò';
        $this->data['view'] = 'admin/roles/edit';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }

    public function edit()
    {
        $idEdit = Session::flash('id_edit');
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            // Validate
            $validate->role(true, $idEdit);
        }
        if (empty($validate->getErrors())) {
            $dataUpdate = [
                'name' => $validate->getDataField()['name'],
                'update_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->rolesModel->updateRole($dataUpdate, "id='$idEdit'");

            if ($status) {
                Session::flash('msg', 'Cập nhật vai trò thành công!');
                Session::flash('msg_type', 'success');
                Response::redirect('admin/quan-ly-vai-tro');
            } else {
                Session::flash('msg', 'Hệ thống đang gặp lỗi!');
                Session::flash('msg_type', 'danger');
            }
        } else {

            Session::flash('errors', $validate->getErrors());
            Session::flash('pre_data', $validate->getDataField());
        }
        Response::redirect('admin/sua-vai-tro/' . $idEdit);
    }
}
