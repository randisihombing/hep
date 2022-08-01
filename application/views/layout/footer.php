</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- TAMBAHAN JS -->
<!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script> -->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<!-- <script src="<?= base_url('assets/'); ?>js/jquery-2.1.4.min.js"></script> -->
<script src="<?= base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ace-elements.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ace.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.custom.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.easypiechart.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.custom.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/chosen.jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/spinbox.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/daterangepicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.knob.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/autosize.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.inputlimiter.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.maskedinput.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-tag.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweetalert2.js"></script>
<script>
    $('#modal-form input[type=file]').ace_file_input({
        style: 'well',
        btn_choose: 'Drop files here or click to choose',
        btn_change: null,
        no_icon: 'ace-icon fa fa-cloud-upload',
        droppable: true,
        thumbnail: 'large'
    })
    $('#modal-form').on('shown.bs.modal', function() {
        if (!ace.vars['touch']) {
            $(this).find('.chosen-container').each(function() {
                $(this).find('a:first-child').css('width', '210px');
                $(this).find('.chosen-drop').css('width', '210px');
                $(this).find('.chosen-search input').css('width', '200px');
            });
        }
    })

    $(document).one('ajaxloadstart.page', function(e) {
        autosize.destroy('textarea[class*=autosize]')

        $('.limiterBox,.autosizejs').remove();
        $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
    });

    $(".next-input").on("keypress", function(e) {
        $(this).next().trigger("focus");
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable()
    })
</script>