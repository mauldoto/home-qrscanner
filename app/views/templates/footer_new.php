<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
  <div class="footer-inner">
    <div class="footer-content">
      <span class="bigger-120">
        <span class="blue bolder">USTP X GCM | HR Angket</span>
        &copy; <?= date('Y') ?>
      </span>

      &nbsp; &nbsp;
    </div>
  </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
<script src="<?= BASEURL; ?>/assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  if ('ontouchstart' in document.documentElement) document.write("<script src='<?= BASEURL; ?>/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/select2.min.js"></script>

<script src="<?= BASEURL; ?>/assets/js/script.js<?= '?' . time() ?>"></script>
<script>
  $(document).ready(function() {
    $('.nik-select2').select2({
      ajax: {
        url: '<?= BASEURL ?>/home/select2',
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            search: params.term, // search term
          };
        },
        processResults: function(data) {
          // Transforms the top-level key of the response object from 'items' to 'results'
          return {
            results: data
          };
        }
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      }
    });
  })
</script>

</body>

</html>