<section class="container" style="margin-top: 120px; width: 600px;">
    <h1 class="mb-4 text-secondary d-flex align-items-center justify-content-center gap-3">
        Thêm Danh Mục Bài Viết
        <img width="50" src="<?= _WEB_ROOT ?>/public/assets/images/plus.png" alt="plus">
    </h1>
    <form action="<?= linkRoute('admin/submit-them-danh-muc-bai-viet') ?>" method="post">
        <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-circle-check"></i>
            Tên danh mục
        </label>
        <div class="input-group has-validation">
            <input value="<?= $preData['name'] ?? false ?> " name="name" type="text" class="form-control <?= invalid($errors, 'name_cate') ?> " id="name_cate">
            <div class="invalid-feedback">
                <?= $errors['name_cate'] ?? false ?>
            </div>
        </div>
        <div class="d-flex align-items-center  mt-4 justify-content-between gap-4">
            <button class="btn btn-primary py-2 w-50">Xác Nhận</button>
            <a class="btn  btn-success py-2 w-50" href="<?= linkRoute('admin/quan-ly-danh-muc-bai-viet') ?>">Quay lại</a>
        </div>
    </form>
</section>