<?php
class ListController extends Controller
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
        $request = new Request();
        $this->data['title'] = 'Quản lý vai trò';
        $this->data['view'] = 'admin/roles/index';
        if ($request->isGet()) {
            $keyword = $request->getBody()['search'] ?? '';
        }
        $this->data['payload']['allRoles'] = $this->rolesModel->getAllRole($keyword);
        $this->data['payload']['preData'] = $request->getBody();
        $this->render('admin/layouts/layout_admin', $this->data);
    }
}
