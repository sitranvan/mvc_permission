<section class="container" style="margin-top: 120px; width: 600px;">
    <h1 class="mb-4 text-secondary d-flex align-items-center justify-content-center gap-3">
        Sửa Vai Trò
        <img width="50" src="<?= _WEB_ROOT ?>/public/assets/images/plus.png" alt="plus">
    </h1>
    <form action="<?= linkRoute('admin/submit-sua-vai-tro') ?>" method="post">
        <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-circle-check"></i>
            Tên vai trò
        </label>
        <div class="input-group has-validation">
            <input value="<?= getValueEdit($pre_data, $dataEdit)['name'] ?>" name="name" type="text" class="form-control <?= invalid($errors, 'role') ?> " id="role">
            <div class="invalid-feedback">
                <?= $errors['role'] ?? false ?>
            </div>
        </div>
        <div class="d-flex align-items-center  mt-4 justify-content-between gap-4">
            <button class="btn btn-primary py-2 w-50">Xác Nhận</button>
            <a class="btn  btn-success py-2 w-50" href="<?= linkRoute('admin/quan-ly-vai-tro') ?>">Quay lại</a>
        </div>
    </form>
</section>