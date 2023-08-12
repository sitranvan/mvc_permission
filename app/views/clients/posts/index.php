<section class="container" style="margin-top: 120px;">
    <form method="get" action="<?= linkRoute('bai-viet') ?>" class="mb-4">
        <div class="d-flex align-items-end gap-4 w-100">
            <div class="" style="width: 25%;">
                <label class="form-label text-secondary fw-medium d-flex align-items-center gap-2" for="sort">Sắp xếp theo
                    <i class="fa-solid fa-sort"></i>
                </label>
                <select class="form-select" name="sort" id="sort">
                    <option <?= isset($preData['sort']) ? selectedPreData($preData['sort'], 'desc') : false ?> value="desc">Mới nhất</option>
                    <option <?= isset($preData['sort']) ? selectedPreData($preData['sort'], 'asc') : false ?> value="asc">Cũ nhất</option>
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
                <button class="btn btn-primary w-100">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <?php if (!empty($allPosts)) :
        foreach ($allPosts as $posts) : ?>
            <hr>
            <div class="mt-4">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="btn btn-success fw-semibold fs-6 text-white fst-italic btn-sm d-flex align-items-center gap-2">
                        <i class="fa fa-user"></i>
                        Tác giả: <?= $posts['fullname'] ?? false ?>
                    </span>
                    <span class="fw-semibold fs-6 text-primary-emphasis d-flex align-items-center gap-2">
                        <i class="fa-solid fa-calendar-days"></i>
                        <?= $posts['create_at'] ?? false ?></span>
                </div>
                <a href="<?= linkRoute('chi-tiet/' . $posts['id']) ?>" class="mt-2 text-secondary clamp-text-2 text-decoration-none">
                    <?= $posts['title'] ?? false ?>
                </a>
            </div>
        <?php endforeach   ?>
    <?php else : ?>
        <div class="text-center text-uppercase fw-medium shadow" colspan="7">
            <img width="200" src="<?= _WEB_ROOT ?>/public/assets/images/empty.jpg" alt="empty">
        </div>
    <?php endif ?>
    <nav class="my-5 d-flex justify-content-end">
        <ul class="pagination pagination-sm">
            <?php if ($currentPage > 1) : ?>
                <li class="page-item">
                    <a class="page-link link-item" href="<?= linkRoute('bai-viet?' . $queryString . '&page=' . ($currentPage - 1)) ?>">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif ?>
            <?php for ($index = $startPage; $index <= $endPage; $index++) : ?>
                <li class="page-item" aria-current="page">
                    <a class="page-link link-item  <?= $index == $currentPage ? 'active' : false ?>" href="<?= linkRoute('bai-viet?' . $queryString . '&page=' . $index) ?>"><?= $index ?></a>
                </li>
            <?php endfor ?>
            <?php if ($currentPage < $totalPages) : ?>
                <li class="page-item">
                    <a class="page-link link-item" href="<?= linkRoute('bai-viet?' . $queryString . '&page=' . ($currentPage + 1)) ?>">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</section>