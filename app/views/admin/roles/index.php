<section style="width: 78%;">
    <?= isset($msg) ? showMessage($msg,  $msg_type) : showMessage(Session::flash('msg'),  Session::flash('msg_type')) ?>

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-9">
            <form action="<?= linkRoute('admin/quan-ly-vai-tro') ?>">
                <div class="row">
                    <div class="col-9">
                        <input value="<?= $preData['search'] ?? '' ?>" name="search" class="form-control" type="text" placeholder="Nhập từ khóa cần tìm...">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (isPermission('roles', 'add')) : ?>
            <div class="col-3">
                <a class="btn btn-outline-primary w-100 rounded-5" href="<?= linkRoute('admin/them-vai-tro') ?>">Thêm Mới
                    <i class="fa-solid fa-plus" style="font-size: 13px;"></i>
                </a>
            </div>
        <?php endif ?>

    </div>
    <hr>
    <table class="table" style="margin-top: 26px;">
        <thead>
            <tr>
                <th class="ps-4 text-secondary center-line" width="15%">STT</th>
                <th class="text-secondary center-line" width="25%">Tên Vai Trò</th>
                <th class="text-secondary center-line" width="25%">Ngày Tạo</th>
                <?php if (isPermission('roles', 'delete') && isPermission('roles', 'edit') && isPermission('roles', 'permission')) : ?>
                    <th class="text-secondary center-line" width="45%">Thao Tác</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($allRoles)) :
                foreach ($allRoles as $key => $role) : ?>
                    <tr>
                        <td class="ps-4 text-secondary center-line"><?= $key + 1 ?></td>
                        <td class="text-secondary center-line"><?= $role['name'] ?></td>
                        <td class="text-secondary center-line"><?= getYMD($role['create_at']) ?></td>
                        <?php if (isPermission('roles', 'delete') && isPermission('roles', 'edit') && isPermission('roles', 'permission')) : ?>
                            <td class="center-line d-flex align-items-center gap-3">
                                <a onclick="return confirm('Có chắc xóa vai trò này ?')" class="btn btn-sm btn-danger" href="<?= linkRoute('admin/xoa-vai-tro/' . $role['id']) ?>">Xóa
                                    <i class="fa-solid fa-trash ms-1"></i>
                                </a>
                                <a class="btn btn-sm btn-warning" href="<?= linkRoute('admin/sua-vai-tro/' . $role['id']) ?>">Sửa
                                    <i class="fa-solid fa-pen-to-square ms-1"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="<?= linkRoute('admin/phan-quyen/' . $role['id']) ?>">Phân Quyền
                                    <i class="fa-solid fa-calendar-check ms-1"></i>
                                </a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td class="text-center text-uppercase fw-medium shadow" colspan="7">
                        <img width="200" src="<?= _WEB_ROOT ?>/public/assets/images/empty.jpg" alt="empty">
                    </td>
                </tr>
            <?php endif ?>

        </tbody>
    </table>
</section>