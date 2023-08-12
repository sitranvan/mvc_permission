<?php
class AddController extends Controller
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
    public function index()
    {
        $this->data['payload']['errors'] = Session::flash('errors');
        $this->data['payload']['pre_data'] = Session::flash('pre_data');
        $this->data['payload']['msg'] = Session::flash('msg');
        $this->data['payload']['msg_type'] = Session::flash('msg_type');
        $this->data['payload']['allRoles'] = $this->rolesModel->getAllRole();
        $this->data['title'] = 'Thêm người dùng';
        $this->data['view'] = 'admin/auth/add';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }
    public function add()
    {
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            // Validate
            $validate->fullname();
            $validate->username(unique: true);
            $validate->email(unique: true);
            $validate->password();
            $validate->confirmPassword();
        }
        if (empty($validate->getErrors())) {
            // Xử lý thêm dữ liệu vào database
            $dataField = $validate->getDataField();
            $dataInsert = [
                'fullname' => $dataField['fullname'],
                'username' => $dataField['username'],
                'email' => $dataField['email'],
                'role_id' => $dataField['roles'],
                'password' => password_hash($dataField['password'], PASSWORD_DEFAULT),
                'create_at' => date('Y-m-d H:i:s')
            ];

            $status = $this->usersModel->insertUser($dataInsert);
            if ($status) {
                Session::flash('msg', 'Thêm người dùng thành công!');
                Session::flash('msg_type', 'success');
                Response::redirect('admin/quan-ly-nguoi-dung');
            } else {
                Session::flash('msg', 'Hệ thống đang gặp lỗi!');
                Session::flash('msg_type', 'danger');
            }
        } else {
            Session::flash('errors', $validate->getErrors());
            Session::flash('pre_data', $validate->getDataField());
        }
        Response::redirect('admin/them-nguoi-dung');
    }
}
