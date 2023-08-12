<?php
$routesConfig = [
    // Routes clients
    'default_controller' => 'ListController',
    'dang-ky' => 'clients/auth/RegisterController',
    'submit-dang-ky' => 'clients/auth/RegisterController/register',
    'dang-nhap' => 'clients/auth/LoginController',
    'submit-dang-nhap' => 'clients/auth/LoginController/login',
    'dang-xuat' => 'clients/auth/LogoutController',
    'quen-mat-khau' => 'clients/auth/ForgotController',
    'submit-quen-mat-khau' => 'clients/auth/ForgotController/forgot',
    'khoi-phuc-mat-khau' => 'clients/auth/ResetController',
    'submit-khoi-phuc-mat-khau' => 'clients/auth/ResetController/reset',
    'doi-mat-khau' => 'clients/auth/ChangePassController',
    'submit-doi-mat-khau' => 'clients/auth/ChangePassController/changePassword',
    'bai-viet' => 'clients/posts/ListController',
    'chi-tiet/(.+)' => 'clients/posts/DetailController/index/$1',

    // Routes admin
    'admin/quan-ly-nguoi-dung' => 'admin/auth/ListController',
    'admin/them-nguoi-dung' => 'admin/auth/AddController',
    'admin/submit-them-nguoi-dung' => 'admin/auth/AddController/add',
    'admin/xoa-nguoi-dung/(.+)' => 'admin/auth/DeleteController/index/$1',
    'admin/sua-nguoi-dung/(.+)' => 'admin/auth/EditController/index/$1',
    'admin/submit-sua-nguoi-dung' => 'admin/auth/EditController/edit',
    'admin/quan-ly-vai-tro' => 'admin/roles/ListController',
    'admin/them-vai-tro' => 'admin/roles/AddController',
    'admin/submit-them-vai-tro' => 'admin/roles/AddController/add',
    'admin/sua-vai-tro/(.+)' => 'admin/roles/EditController/index/$1',
    'admin/submit-sua-vai-tro' => 'admin/roles/EditController/edit',
    'admin/xoa-vai-tro/(.+)' => 'admin/roles/DeleteController/index/$1',
    'admin/quan-ly-bai-viet' => 'admin/posts/ListController',
    'admin/quan-ly-danh-muc-bai-viet' => 'admin/categories/ListController',
    'admin/xoa-danh-muc-bai-viet/(.+)' => 'admin/categories/DeleteController/index/$1',
    'admin/sua-danh-muc-bai-viet/(.+)' => 'admin/categories/EditController/index/$1',
    'admin/submit-sua-danh-muc-bai-viet' => 'admin/categories/EditController/edit',
    'admin/them-danh-muc-bai-viet' => 'admin/categories/AddController',
    'admin/submit-them-danh-muc-bai-viet' => 'admin/categories/AddController/add',
    'admin/xoa-bai-viet/(.+)' => 'admin/posts/DeleteController/index/$1',
    'admin/sua-bai-viet/(.+)' => 'admin/posts/EditController/index/$1',
    'admin/submit-sua-bai-viet' => 'admin/posts/EditController/edit',
    'admin/chi-tiet-bai-viet/(.+)' => 'admin/posts/DetailController/index/$1',
    'admin/phan-quyen/(.+)' => 'admin/roles/PermissionController/index/$1'

];

/**
 * Với những route có tiền tố submit tức là liên quan đén xử lí form sẽ có 2 đường dẫn
 * 1. Hiển thị view, lỗi
 * 2. Xử lí logic khi submit thành công 
 * -> Với đường dẫn thứ 2 nếu không định nghĩa submit-duong-dan thì trong view action sẽ lấy luôn đường dẫn đến Controller tương ứng
 */
