<?= $type == 'dashboard' ? $this->extend('layout/dashboard_layout') : $this->extend('layout/login_layout') ?>

<?= $this->section('content') ?>
<?= alert('message') ?>
<?= $view ?>
<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    setTimeout(() => {
        $('.alert').fadeOut('slow');
    }, 2000);
</script>
<?= $this->endSection() ?>