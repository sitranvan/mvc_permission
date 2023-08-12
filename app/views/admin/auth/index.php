<section style="width: 78%;">
    <?= isset($msg) ? showMessage($msg,  $msg_type) : showMessage(Session::flash('msg'),  Session::flash('msg_type')) ?>

    <form method="get" action="<?= linkRoute('admin/quan-ly-nguoi-dung') ?>">
        <div class="d-flex align-items-end gap-4">

            <div style="width: 30%;">
                <label class="form-label text-secondary fw-medium d-flex align-items-center gap-2" for="role">Vai trò
                    <img width="22" src="<?= _WEB_ROOT ?>/public/assets/images/groups.png" alt="groups">
                </label>
                <select class="form-select" name="role" id="role">
                    <option <?= selectedPreData($preData, 'all') ?> value="all">Tất cả</option>
                    <?php if (!empty($allRoles)) :
                        foreach ($allRoles as $role) : ?>
                            <option <?= isset($preData['role']) ? selectedPreData($preData['role'], $role['id']) : false  ?> value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                    <?php endforeach;
                    endif ?>
                </select>
            </div>
            <div style="width: 40%;">
                <input value="<?= $preData['search'] ?? false ?>" name="search" class="form-control" type="text" placeholder="Nhập từ khóa tìm kiếm....">
            </div>
            <div style="width: 15%;">
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </div>
            <?php if (isPermission('auth', 'add')) : ?>
                <div style="width: 15%;">
                    <a class="btn btn-outline-primary w-100 rounded-5" href="<?= linkRoute("admin/them-nguoi-dung") ?>">Thêm Mới
                        <i class=" fa-solid fa-plus" style="font-size: 13px;"></i>
                    </a>
                </div>
            <?php endif ?>
        </div>
    </form>

    <hr>
    <table class="table" style="margin-top: 20px;">
        <thead>
            <tr>
                <th class="ps-4 center-line text-secondary" width="10%">STT</th>
                <th class="center-line text-secondary" width="15%">Họ Tên</th>
                <th class="center-line text-secondary" width="15%">Username</th>
                <th class="center-line text-secondary" width="20%">Email</th>
                <th class="center-line text-secondary" width="15%">Ngày Tạo</th>
                <th class="center-line text-secondary" width="10%">Vai Trò</th>
                <?php if (isPermission('auth', 'delete') && isPermission('auth', 'edit')) : ?>
                    <th class="center-line text-secondary" width="15%">Thao Tác</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($allUsers)) :
                foreach ($allUsers as $key => $user) : ?>
                    <tr class="<?= $user['name'] == 'Admin' ? 'table-primary' : false ?>">
                        <td class="ps-4 center-line text-secondary"><?= $key + 1 ?></td>
                        <td class="center-line text-secondary"><?= $user['fullname'] ?></td>
                        <td class="center-line text-secondary"><?= $user['username'] ?></td>
                        <td class="center-line text-secondary"><?= $user['email'] ?></td>
                        <td class="center-line text-secondary"><?= getYMD($user['create_at']) ?></td>
                        <td class="center-line text-secondary"><?= $user['name'] ?></td>
                        <?php if (isPermission('auth', 'delete') && isPermission('auth', 'edit')) : ?>
                            <td class="center-line text-secondary">
                                <?php if ($user['name'] != 'Admin') : ?>
                                    <a onclick="return confirm('Có chắn chắn xóa người dùng này?')" class="btn btn-danger btn-sm px-3" href="<?= linkRoute('admin/xoa-nguoi-dung/' . $user['id']) ?>">Xóa</a>
                                    <a class="btn btn-warning btn-sm px-3 ms-2" href="<?= linkRoute('admin/sua-nguoi-dung/' . $user['id']) ?>">Sửa</a>
                                <?php else : ?>
                                    <div class="text-center w-100">
                                        <img width="31" src="<?= _WEB_ROOT ?>/public/assets/images/key.png" alt="key">
                                    </div>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td class="center-line text-center text-uppercase fw-medium shadow" colspan="7">
                        <img width="200" src="<?= _WEB_ROOT ?>/public/assets/images/empty.jpg" alt="empty">
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <nav class="mt-5 d-flex justify-content-end">
        <ul class="pagination pagination-sm">
            <?php if ($currentPage > 1) : ?>
                <li class="page-item">
                    <a class="page-link link-item" href="<?= linkRoute('admin/quan-ly-nguoi-dung?' . $queryString . '&page=' . ($currentPage - 1)) ?>">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif ?>
            <?php for ($index = $startPage; $index <= $endPage; $index++) : ?>
                <li class="page-item" aria-current="page">
                    <a class="page-link link-item  <?= $index == $currentPage ? 'active' : false ?>" href="<?= linkRoute('admin/quan-ly-nguoi-dung?' . $queryString . '&page=' . $index) ?>"><?= $index ?></a>
                </li>
            <?php endfor ?>
            <?php if ($currentPage < $totalPages) : ?>
                <li class="page-item">
                    <a class="page-link link-item" href="<?= linkRoute('admin/quan-ly-nguoi-dung?' . $queryString . '&page=' . ($currentPage + 1)) ?>">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</section>