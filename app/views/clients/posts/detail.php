<section style="margin-top: 100px;" class="container">
    <div class="d-flex align-items-baseline justify-content-between">
        <div class="fw-medium d-flex align-items-center">
            <a href="<?= linkRoute('admin/quan-li-bai-viet') ?>" class="text-primary-emphasis text-decoration-none">
                <i class="fa-solid fa-user"></i>
                Người Đăng: <?= $posts['fullname'] ?></a>
        </div>
        <p class="text-primary-emphasis fw-semibold">
            <i class="fa-solid fa-calendar-days"></i>
            Ngày Đăng: <?= $posts['create_at'] ?>
        </p>
    </div>
    <hr>
    <h3 class="text-dark">
        <?= $posts['title'] ?>
    </h3>
    <p class="text-primary-emphasis fw-semibold mt-3">
        <i class="fa-regular fa-window-maximize"></i>
        Danh Mục: <?= $posts['name'] ?>
    </p>
    <div class="mt-4"> <?= html_entity_decode($posts['description']) ?></div>
</section>