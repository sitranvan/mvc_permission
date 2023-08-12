<div style="width: 22%;">
    <div class="nav-info shadow text-uppercase d-flex align-items-center gap-2 ps-4">
        <i class="fa fa-user"></i>
        Tran Van Si - Admin
    </div>

    <div class="list-group shadow">
        <a href="<?= linkRoute('admin/quan-ly-nguoi-dung') ?>" class="list-group-item list-group-item-action list-group-item-body link-nav d-flex align-items-center gap-2 <?= activeNav('admin/quan-ly-nguoi-dung') ?>">
            <i style="width: 20px;" class="fa-regular fa-user text-center"></i>
            Quản lý người dùng
        </a>
        <a href="<?= linkRoute('admin/quan-ly-vai-tro') ?>" class="list-group-item list-group-item-action list-group-item-body link-nav d-flex align-items-center gap-2 <?= activeNav('admin/quan-ly-vai-tro') ?>">
            <i style="width: 20px;" class="fa-solid fa-users text-center"></i>
            Quản lý vai trò
        </a>
        <a href="<?= linkRoute('admin/quan-ly-danh-muc-bai-viet') ?>" class="list-group-item list-group-item-action list-group-item-body link-nav d-flex align-items-center gap-2 <?= activeNav('admin/quan-ly-danh-muc-bai-viet') ?>">
            <i style="width: 20px;" class="fa-brands fa-windows text-center"></i>
            Quản lý danh mục bài viết
        </a>
        <a href="<?= linkRoute('admin/quan-ly-bai-viet') ?>" class="list-group-item list-group-item-action list-group-item-body link-nav d-flex align-items-center gap-2 <?= activeNav('admin/quan-ly-bai-viet') ?>">
            <i style="width: 20px;" class="fa-solid fa-book-open text-center"></i>
            Quản lý bài viết
        </a>
    </div>
</div>