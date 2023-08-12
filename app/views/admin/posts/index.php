<section style="width: 78%;">
    <?= isset($msg) ? showMessage($msg,  $msg_type) : showMessage(Session::flash('msg'),  Session::flash('msg_type')) ?>

    <form method="get" action="<?= linkRoute('admin/quan-ly-bai-viet') ?>">
        <div class="d-flex align-items-end gap-4 w-100">
            <div class="" style="width: 25%;">
                <label class="form-label text-secondary fw-medium d-flex align-items-center gap-2" for="status">Trạng thái
                    <img width="22" src="<?= _WEB_ROOT ?>/public/assets/images/status.png" alt="status">
                </label>
                <select class="form-select" name="status" id="status">
                    <option value="all">Tất cả</option>
                    <option <?= selectedPreDataStatus($preData, 0) ?> value="0">Chưa duyệt</option>
                    <option <?= selectedPreDataStatus($preData, 1) ?> v value="1">Đã duyệt</option>
                </select>
            </div>
            <div class="" style="width: 25%;">
                <label class="form-label text-secondary fw-medium d-flex align-items-center gap-2" for="categories">Danh mục
                    <img width="20" src="<?= _WEB_ROOT ?>/public/assets/images/categories.png" alt="categories">
                </label>
                <select class="form-select" name="categories" id="categories">
                    <option value="all">Tất cả</option>
                    <?php foreach ($allCategories as $cate) : ?>
                        <option <?= isset($preData['categories']) ? selectedPreData($preData['categories'], $cate['id']) : false  ?> value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div style="width: 40%;">
                <input value="<?= $preData['search'] ?? false ?>" name="search" type="text" class="form-control" placeholder="Nhập tiêu đề cần tìm...">
            </div>
            <div class="" style="width: 10%;">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <hr>
    <table class="table" style="margin-top: 20px;">
        <thead>
            <tr>
                <th class="ps-2 center-line text-secondary" width="5%">STT</th>
                <th class="center-line text-secondary" width="25%">Tiêu Đề</th>
                <th class="center-line text-secondary" width="15%">Người Đăng</th>
                <th class="center-line text-secondary" width="15%">Thời gian</th>
                <th class="center-line text-secondary" width="15%">Trạng Thái</th>
                <th class="center-line text-secondary" width="20%">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($allPosts)) :
                foreach ($allPosts as $key => $posts) :
            ?>
                    <tr>
                        <td class="ps-2"><?= $key + 1 ?></td>
                        <td>
                            <a class="clamp-text" href="<?= linkRoute('admin/chi-tiet-bai-viet/' . $posts['id']) ?>"><?= $posts['title'] ?></a>
                        </td>
                        <td><?= $posts['fullname'] ?></td>
                        <td><?= getYMD($posts['create_at']) ?></td>
                        <td>
                            <?= $posts['status'] == 0 ?
                                '<span class="btn btn-sm btn-warning">Chưa duyệt</span>' :
                                '<span class="btn btn-sm btn-success">Đã duyệt</span>' ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Có chắc xóa bài viết này?')" class="btn btn-sm btn-danger" href="<?= linkRoute('admin/xoa-bai-viet/') . $posts['id'] ?>">Xóa</a>
                            <a class="btn btn-sm btn-warning" href="<?= linkRoute('admin/sua-bai-viet/') . $posts['id'] ?>">Sửa</a>
                            <a class="btn btn-sm btn-success" href="">Duyệt</a>
                        </td>
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
                    <a class="page-link link-item" href="<?= linkRoute('admin/quan-ly-bai-viet?' . $queryString . '&page=' . ($currentPage - 1)) ?>">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif ?>
            <?php for ($index = $startPage; $index <= $endPage; $index++) : ?>
                <li class="page-item" aria-current="page">
                    <a class="page-link link-item  <?= $index == $currentPage ? 'active' : false ?>" href="<?= linkRoute('admin/quan-ly-bai-viet?' . $queryString . '&page=' . $index) ?>"><?= $index ?></a>
                </li>
            <?php endfor ?>
            <?php if ($currentPage < $totalPages) : ?>
                <li class="page-item">
                    <a class="page-link link-item" href="<?= linkRoute('admin/quan-ly-bai-viet?' . $queryString . '&page=' . ($currentPage + 1)) ?>">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</section>