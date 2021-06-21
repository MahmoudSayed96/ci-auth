<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getEnv('app.name'); ?>|<?= $this->renderSection('pageTitle'); ?></title>
    <link rel="stylesheet" href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css'); ?>">
</head>

<body>
    <?= $this->include('partials/nav'); ?>
    <?= $this->renderSection('content'); ?>
    <!-- Javascript files -->
    <script src="<?= base_url('/assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>