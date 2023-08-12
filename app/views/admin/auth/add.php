<section class="container" style="margin-top: 100px; width: 700px;">
    <h1 class="mb-4 text-secondary d-flex align-items-center justify-content-center gap-3">
        Thêm Người Dùng
        <img width="50" src="<?= _WEB_ROOT ?>/public/assets/images/add_user.png" alt="add_user">
    </h1>
    <form action="<?= linkRoute('admin/submit-them-nguoi-dung') ?>" method="post">
        <div class="row">
            <div class="col">
                <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
                    <i class="fa-solid fa-user"></i>
                    Họ Tên
                </label>
                <div class="input-group has-validation">
                    <input value="<?= $pre_data['fullname'] ?? false ?>" name="fullname" type="text" class="form-control <?= invalid($errors, 'fullname') ?> " id="fullname">
                    <div class="invalid-feedback">
                        <?= $errors['fullname'] ?? false ?>
                    </div>
                </div>
                <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
                    <i class="fa-solid fa-user"></i>
                    Email
                </label>
                <div class="input-group has-validation">
                    <input value="<?= $pre_data['email'] ?? false ?>" name="email" type="text" class="form-control <?= invalid($errors, 'email') ?> " id="email">
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
                                <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                        <?php endforeach;
                        endif ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors['roles'] ?? false ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
                    <i class="fa-solid fa-user"></i>
                    Username
                </label>
                <div class="input-group has-validation">
                    <input value="<?= $pre_data['username'] ?? false ?>" name="username" type="text" class="form-control <?= invalid($errors, 'username') ?> " id="username">
                    <div class="invalid-feedback">
                        <?= $errors['username'] ?? false ?>
                    </div>
                </div>
                <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
                    <i class="fa-solid fa-user"></i>
                    Password
                </label>
                <div class="input-group has-validation">
                    <input value="<?= $pre_data['password'] ?? false ?>" name="password" type="text" class="form-control <?= invalid($errors, 'password') ?> " id="password">
                    <div class="invalid-feedback">
                        <?= $errors['password'] ?? false ?>
                    </div>
                </div>
                <label for="username" class="form-label fw-semibold mt-2 text-primary-emphasis">
                    <i class="fa-solid fa-user"></i>
                    Password
                </label>
                <div class="input-group has-validation">
                    <input value="<?= $pre_data['confirm_password'] ?? false ?>" name="confirm_password" type="text" class="form-control <?= invalid($errors, 'confirm_password') ?> " id="confirm_password">
                    <div class="invalid-feedback">
                        <?= $errors['confirm_password'] ?? false ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center  mt-4 justify-content-between gap-4">
            <button class="btn btn-primary py-2 w-50">Thêm Vào Hệ Thống</button>
            <a class="btn  btn-success py-2 w-50" href="<?= linkRoute('admin/quan-ly-nguoi-dung') ?>">Quay lại</a>
        </div>
    </form>
</section>