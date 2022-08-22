<!-- Footer-->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<footer class="py-5 bg-dark ">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Fotocopy Setengah Enam Pagi <?= date('Y'); ?></p>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url('assets/') ?>js/scripts.js"></script>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('templateLTE/') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('templateLTE/') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('templateLTE/') ?>/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('templateLTE/') ?>/plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('templateLTE/') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 300000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil ditambahkan'
            })
        });
    });
</script>

<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let filName = $(this).val().split('\\').pop()
        $(this).next('.custom-file-label').addClass("selected").html(filName);
    })
</script>
</body>

</html>