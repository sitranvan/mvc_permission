<?php
class PermissionController extends Controller
{
    private $rolesModel;
    private $modulesModel;
    private $data;
    public function __construct()
    {
        $this->data = [];
        $this->rolesModel = $this->loadModel('roles/RolesModel');
        $this->modulesModel = $this->loadModel('modules/ModulesModel');
    }
    public function index($id)
    {
        $request = new Request();
        $this->data['title'] = 'Phân quyền';
        $this->data['view'] = 'admin/roles/permission';
        $this->data['payload']['role'] = $this->rolesModel->getRole("id='$id'");
        $this->data['payload']['preData'] = Session::flash('preData');
        $this->data['payload']['allModules'] = $this->modulesModel->getAllModules();
        if ($request->isPost()) {
            if (!empty($request->getBody()['permissions'])) {
                $permissionJson = json_encode($request->getBody()['permissions']);
            } else {
                $permissionJson = '';
            }
            $dataUpdate = [ 
                'permission' => $permissionJson,
                'update_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->rolesModel->updateRole($dataUpdate, "id='$id'");
            if ($status) {
                Session::flash('msg', 'Phân quyền thành công!');
                Session::flash('msg_type', 'success');
            } else {
                Session::flash('msg', 'Hệ thống đang gặp lỗi!');
                Session::flash('msg_type', 'danger');
            }
        }
        $permissionArr = json_decode($this->rolesModel->getRole("id='$id'")['permission'], true);
        $this->data['payload']['permissionArr'] = $permissionArr;
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }
}
