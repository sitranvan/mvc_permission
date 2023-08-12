<?php
function loadLayout($layout = '', $title = '')
{
    $fileLayout = _DIR_ROOT . '/app/views/layouts/' . $layout . '.php';
    if (file_exists($fileLayout)) {
        require_once $fileLayout;
    } else {
        require_once _DIR_ROOT . '/app/views/errors/layout.php';
    }
}

function invalid($errors = [], $fieldName = '')
{
    return isset($errors[$fieldName]) ? 'is-invalid' : 'border-primary-subtle';
}

function showMessage($msg = '', $msgType = '')
{
    if (isset($msg) && isset($msgType)) {
        return
            '<div class="alert py-3 alert-' . $msgType . '" role="alert">
                ' . $msg . '
             </div>';
    }
}
function linkRoute($route = '/')
{
    return _WEB_ROOT . '/' . $route;
}

function getYMD($date = '')
{
    if (!empty($date)) {
        return date('Y-m-d', strtotime($date));
    }
}

function getValueEdit($preData = [], $dataEdit = [])
{
    if (empty($preData) && !empty($dataEdit)) {
        return $dataEdit;
    }
    return $preData;
}

function checkSelectedRole($dataEdit = [], $role = [])
{
    return (isset($dataEdit['role_id']) &&  $dataEdit['role_id'] == $role['id']) ? 'selected' : false;
}
function checkSelectedCate($dataEdit = [], $cate = [])
{
    return (isset($dataEdit['cate_id']) &&  $dataEdit['cate_id'] == $cate['id']) ? 'selected' : false;
}
function checkSelectedStatus($dataEdit = [], $value = '')
{
    return (isset($dataEdit['status']) &&  $dataEdit['status'] == $value ? 'selected' : false);
}

function selectedPreDataStatus($preData = [], $value = '')
{
    return (isset($preData['status']) &&  $preData['status'] == $value ? 'selected' : false);
}



function selectedPreData($data = '', $value = '')
{

    if (isset($data)  && $data == $value) {
        return 'selected';
    }
    return false;
}

function activeNav($route = '')
{

    $routeFinal = '/' . $route;
    $pathInfo = $_SERVER['PATH_INFO'];
    if ($routeFinal == $pathInfo) {
        return 'active-nav';
    }
}

function isPermission($module, $action)
{
    $db = new DataBase();
    $userLogin = new UserLogin();
    $roleId = $userLogin->get()['role_id'];
    $roles = $db->get("SELECT permission FROM roles WHERE id='$roleId'");
    $permission = $roles['permission'];
    $permissionData = json_decode($permission, true);
    if (!empty($permissionData[$module])) {
        $actionArr = $permissionData[$module];
        if (!empty($actionArr) && in_array($action, $actionArr)) {
            return true;
        }
    }
    return false;
}
