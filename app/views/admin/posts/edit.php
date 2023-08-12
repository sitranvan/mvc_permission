<section class="container" style="margin-top: 120px; margin-bottom:120px;">
    <h1 class="mb-4 text-secondary d-flex align-items-center justify-content-center gap-3">
        Sửa Bài Viết
        <img width="50" src="<?= _WEB_ROOT ?>/public/assets/images/plus.png" alt="plus">
    </h1>
    <form action="<?= linkRoute('admin/submit-sua-bai-viet') ?>" method="post">
        <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-thermometer text-primary"></i>
            Tiêu đề
        </label>
        <div class="input-group has-validation">
            <input value="<?= getValueEdit($pre_data, $dataEdit)['title'] ?>" name="title" type="text" class="form-control <?= invalid($errors, 'title') ?> " id="title">
            <div class="invalid-feedback">
                <?= $errors['title'] ?? false ?>
            </div>
        </div>
        <label for="username" class="form-label d-flex align-items-center gap-2 fw-semibold mt-3 text-primary-emphasis">
            <img width="18" src="<?= _WEB_ROOT ?>/public/assets/images/categories.png" alt="categories">
            Danh mục
        </label>
        <div class="input-group has-validation">
            <div class="input-group has-validation">
                <select class="form-select" name="cate" id="cate">
                    <?php if (!empty($allCategories)) :
                        foreach ($allCategories as $cate) : ?>
                            <option <?= checkSelectedCate($dataEdit, $cate) ?> value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                    <?php endforeach;
                    endif ?>
                </select>
            </div>

        </div>
        <label for="username" class="form-label d-flex align-items-center gap-2 fw-semibold mt-3 text-primary-emphasis">
            <i class="fa-solid fa-circle-check text-primary"></i>
            Trạng thái
        </label>
        <div class="input-group has-validation">
            <div class="input-group has-validation">
                <select class="form-select" name="status" id="status">
                    <option <?= checkSelectedStatus($dataEdit, 0) ?> value="0">Chưa duyệt</option>
                    <option <?= checkSelectedStatus($dataEdit, 1) ?> value="1">Đã duyệt</option>
                </select>
            </div>

        </div>
        <label for="username" class="form-label d-flex align-items-center gap-2 fw-semibold mt-3 text-primary-emphasis">
            <i class="fa-solid fa-feather text-primary"></i>
            Mô tả bài viết
        </label>
        <div class="input-group has-validation">
            <textarea name="description" id="editor_admin"><?= getValueEdit($pre_data, $dataEdit)['description'] ?? false ?></textarea>
            <div class="invalid-feedback">
                <?= $errors['titile'] ?? false ?>
            </div>
        </div>
        <div class="d-flex align-items-center  mt-4 justify-content-between gap-4">
            <button type="submit" class="btn btn-primary py-2 w-50">Xác Nhận</button>
            <a class="btn  btn-success py-2 w-50" href="<?= linkRoute('admin/quan-ly-bai-viet') ?>">Quay lại</a>
        </div>
    </form>
</section>