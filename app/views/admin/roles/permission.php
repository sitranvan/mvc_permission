<section class="container" style="margin-top: 120px;">
    <a class="btn btn-success px-4" href="">
        <i class="fa-solid fa-backward me-2"></i>
        Quay lại
    </a>
    <p class="text-uppercase fw-bold  fs-3 text-secondary text-center mt-4">Phân quyền: <?= $role['name'] ?>
        <i class="fa-regular fa-circle-check"></i>
    </p>
    <?= isset($msg) ? showMessage($msg,  $msg_type) : showMessage(Session::flash('msg'),  Session::flash('msg_type')) ?>
    <form class="mt-5" method="post" action="">
        <table class="table">
            <thead>
                <tr>
                    <th class="ps-5" width="25%">Modules</th>
                    <th>Phân Quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allModules as $modules) : ?>
                    <tr>
                        <td class="ps-5"><?= $modules['title'] ?></td>
                        <td>
                            <div class="row">
                                <?php foreach (json_decode($modules['actions'], true) as $key => $act) : ?>
                                    <div class="col">
                                        <input <?= (!empty($permissionArr[$modules['name']]) && in_array($key, ($permissionArr[$modules['name']]))) ? 'checked' : false ?> value="<?= $key ?>" name="<?= 'permissions[' . $modules['name'] . '][]' ?>" id="<?= $modules['name'] . '_' . $key ?>" type="checkbox">
                                        <label for="<?= $modules['name'] . '_' . $key ?>"><?= $act ?></label>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Phân quyền</button>
    </form>
</section>