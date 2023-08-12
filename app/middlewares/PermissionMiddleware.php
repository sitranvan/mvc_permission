<?php
class PermissionMiddleware
{
    private $db;
    public function __construct()
    {
        $this->db = new DataBase();
    }
    public function handle($url)
    {
        $userLogin = new UserLogin();
        $roleId = $userLogin->get()['role_id'] ?? '';
        $roles = $this->db->get("SELECT permission,name FROM roles WHERE id='$roleId'");
        $permission = $roles['permission'] ?? '';
        // Xử lí tách url
        $urlArr = explode('/', $url);
        $roleName = $urlArr[0];
        $module = $urlArr[1] ?? '';
        $action = strtolower($urlArr[2] ?? '');
        $actionFinal = str_replace('controller', '', $action);

        if (strtolower($roles['name']) == 'user' && $roleName == 'admin') {
            App::$app->renderError('permission');
        }

        if (!empty($permission)) {
            $permissionData = json_decode($permission, true);
            $checkPermission = $this->handlePermission($permissionData, $module, $actionFinal);
            // Chỉ phân quyền đối với giao diện quản trị còn user bình thường mặc định không có quyền truy cập
            if (!$checkPermission) {
                if ($roleName == 'admin') {
                    App::$app->renderError('permission');
                }
            }
        }
    }

    public function handlePermission($permissionData, $module, $action)
    {
        if (!empty($permissionData[$module])) {
            $actionArr = $permissionData[$module];
            if (!empty($actionArr) && in_array($action, $actionArr)) {
                return true;
            }
        }
        return false;
    }
}
