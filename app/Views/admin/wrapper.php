<?= $this->include('load/bootstrap') ?>
<?= $this->include('load/bootstrap-icons') ?>
<?= $this->extend('wrapper') ?>

<?= $this->section('content') ?>
<?= $this->renderSection('adminContent') ?>
<?= $this->endSection() ?>