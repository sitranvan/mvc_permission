<?php
class ListController extends Controller
{
    private $data;
    private $usersModel;
    private $rolesModel;
    public function __construct()
    {
        $this->usersModel = $this->loadModel('auth/UsersModel');
        $this->rolesModel = $this->loadModel('roles/RolesModel');
        $this->data = [];
    }
    public function index()
    {
        $request = new Request();
        if ($request->isGet()) {
            $keyword = $request->getBody()['search'] ?? '';
            $role = $request->getBody()['role'] ?? '';
            $currentPage = $request->getBody()['page'] ?? 1;
        }

        $urlParams = [
            'search' => $keyword,
            'role' => $role,
        ];
        $queryString = http_build_query($urlParams);

        $this->data['view'] = 'admin/auth/index';
        $this->data['title'] = 'Quản lý người dùng';
        $this->data['payload']['allUsers'] = $this->usersModel->getAllUser($keyword, $role, $currentPage);
        $totalPages =  $this->usersModel->getTotalPages();
        $this->data['payload']['allRoles'] = $this->rolesModel->getAllRole();
        $this->data['payload']['totalPages'] =  $this->usersModel->getTotalPages();
        $this->data['payload']['queryString'] = $queryString;
        $this->data['payload']['currentPage'] = $currentPage;
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $currentPage + 2);
        $this->data['payload']['startPage'] = $startPage;
        $this->data['payload']['endPage'] = $endPage;
        $this->data['payload']['preData'] = $request->getBody();
        $this->render('admin/layouts/layout_admin', $this->data);
    }
}
