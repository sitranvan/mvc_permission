<?php
class AddController extends Controller
{
    private $data;
    private $rolesModel;
    public function __construct()
    {
        $this->rolesModel = $this->loadModel('roles/RolesModel');
        $this->data = [];
    }
    public function index()
    {
        $this->data['payload']['errors'] = Session::flash('errors');
        $this->data['payload']['pre_data'] = Session::flash('pre_data');
        $this->data['payload']['msg'] = Session::flash('msg');
        $this->data['payload']['msg_type'] = Session::flash('msg_type');
        $this->data['title'] = 'Thêm vai trò';
        $this->data['view'] = 'admin/roles/add';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }

    public function add()
    {
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            // Validate
            $validate->role(unique: true);
        }
        if (empty($validate->getErrors())) {
            $dataInsert = [
                'name' => $validate->getDataField()['name'],
                'create_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->rolesModel->insertRole($dataInsert);
            if ($status) {
                Session::flash('msg', 'Thêm vai trò thành công!');
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
        Response::redirect('admin/them-vai-tro');
    }
}
