<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/tempus-dominus/dist/css/tempus-dominus.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/popper/dist/umd/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/tempus-dominus/dist/js/tempus-dominus.min.js') ?>"></script>
<script src="<?= base_url('assets/tempus-dominus/dist/plugins/customDateFormat.js') ?>"></script>
<script>
  tempusDominus.extend(window.tempusDominus.plugins.customDateFormat);
</script>
<?= $this->endSection() ?>