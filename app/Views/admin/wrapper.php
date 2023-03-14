<?= $this->include('load/bootstrap') ?>
<?= $this->include('load/bootstrap-icons') ?>
<?= $this->extend('wrapper') ?>

<?= $this->section('content') ?>
<!-- Menu -->
<nav class="nav nav-tabs">
  <a href="<?= base_url('admin') ?>" class="nav-link <?= current_url() == base_url('admin') ? 'active' : '' ?>">Home</a>
  <a href="<?= base_url('admin/customer') ?>" class="nav-link <?= current_url() == base_url('admin/customer') ? 'active' : '' ?>">Customer</a>
</nav>
<!-- End Menu -->
<?= $this->renderSection('adminContent') ?>
<?= $this->endSection() ?>