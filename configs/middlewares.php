<?php
$publicRoutes = [
    'dang-ky',
    'dang-nhap',
    'quen-mat-khau',
    'khoi-phuc-mat-khau'
];
$privateRoutes = [
    'danh-sach',
    'chi-tiet/(.+)',
    'dang-xuat',
    'doi-mat-khau',
];

$authMiddleware = AuthMiddleware::class;
$providerMiddleware = ProviderMiddleware::class;
$permissionMiddleware = PermissionMiddleware::class;
