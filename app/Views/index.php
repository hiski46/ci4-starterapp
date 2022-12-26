<?= $type == 'dashboard' ? $this->extend('layout/dashboard_layout') : $this->extend('layout/login_layout') ?>

<?= $this->section('content') ?>
<?= $view ?>
<?= $this->endSection() ?>