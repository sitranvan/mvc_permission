<section class="container" style="margin-top: 100px; width: 600px;">
    <h1 class="mb-4 text-secondary d-flex align-items-center justify-content-center gap-3">
        Sửa Người Dùng
        <img width="50" src="<?= _WEB_ROOT ?>/public/assets/images/edit_user.png" alt="edit_user">
    </h1>
    <form action="<?= linkRoute('admin/submit-sua-nguoi-dung') ?>" method="post">
        <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-user"></i>
            Họ Tên
        </label>
        <div class="input-group has-validation">
            <input value="<?= getValueEdit($pre_data, $dataEdit)['fullname'] ?>" name="fullname" type="text" class="form-control <?= invalid($errors, 'fullname') ?> " id="fullname">
            <div class="invalid-feedback">
                <?= $errors['fullname'] ?? false ?>
            </div>
        </div>
        <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-user"></i>
            Username
        </label>
        <div class="input-group has-validation">
            <input value="<?= getValueEdit($pre_data, $dataEdit)['username'] ?>" name="username" type="text" class="form-control <?= invalid($errors, 'username') ?> " id="username">
            <div class="invalid-feedback">
                <?= $errors['username'] ?? false ?>
            </div>
        </div>
        <label for="email" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-user"></i>
            Email
        </label>
        <div class="input-group has-validation">
            <input name="email" value="<?= getValueEdit($pre_data, $dataEdit)['email'] ?>" type="text" class="form-control <?= invalid($errors, 'email') ?> " id="email">
            <div class="invalid-feedback">
                <?= $errors['email'] ?? false ?>
            </div>
        </div>
        <label for="roles" class="form-label fw-semibold mt-2 text-primary-emphasis">
            <i class="fa-solid fa-user"></i>
            Vai trò
        </label>
        <div class="input-group has-validation">
            <select class="form-select" name="roles" id="roles">
                <?php if (!empty($allRoles)) :
                    foreach ($allRoles as $role) : ?>
                        <option <?= checkSelectedRole($dataEdit, $role) ?> value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                <?php endforeach;
                endif ?>
            </select>
        </div>
        <div class="d-flex align-items-center  mt-4 justify-content-between gap-4">
            <button class="btn btn-primary py-2 w-50">Xác Nhận</button>
            <a class="btn  btn-success py-2 w-50" href="<?= linkRoute('admin/quan-ly-nguoi-dung') ?>">Quay lại</a>
        </div>
    </form>
</section>