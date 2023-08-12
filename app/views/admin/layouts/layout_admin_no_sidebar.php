<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/assets/css/style.css?ver=<?= rand() ?>">
    <script src="<?= _WEB_ROOT ?>/app/libraries/ckeditor/ckeditor.js?ver=<?= rand() ?>"></script>
    <script src="<?= _WEB_ROOT ?>/app/libraries/ckfinder/ckfinder.js?ver=<?= rand() ?>"></script>

    <title><?= $title ?? 'Permission' ?></title>
</head>

<body>
    <?php
    Load::render('admin/components/header_admin');
    if (isset($payload)) {
        Load::render($view, $payload);
    } else {
        Load::render($view);
    }
    Load::render('admin/components/footer_admin');
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/js/bootstrap.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/js/main.js?ver=<?= rand() ?>"></script>


</html>