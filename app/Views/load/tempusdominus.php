<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/tempus-dominus/build/css/tempusdominus-bootstrap-4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->include('load/jquery') ?>
<?= $this->include('load/moment') ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/tempus-dominus/build/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script>
  $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
    icons: {
      time: 'bi bi-clock',
      date: 'bi bi-calendar2-fill',
      up: 'bi bi-arrow-up',
      down: 'bi bi-arrow-down',
      previous: 'bi bi-chevron-left',
      next: 'bi bi-chevron-right',
      today: 'bi bi-calendar-check',
      clear: 'bi bi-trash',
      close: 'bi bi-times'
    }
  });
</script>
<?= $this->endSection() ?>