 </div>
 <!-- /.row -->
 </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Main Footer -->
 <footer class="main-footer">
     <!-- To the right -->
     <!-- Default to the left -->
     <strong>Copyright &copy; 2022 <a href="#">SIG JERUK</a>.</strong> Sistem Informasi Geografis.
 </footer>
 </div>
 <!-- ./wrapper -->


 <!-- REQUIRED SCRIPTS -->
 <!-- jQuery -->
 <script src="<?= base_url()?>template/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url()?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables -->
 <script src="<?= base_url()?>template/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url()?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url()?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url()?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url()?>template/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url()?>template/dist/js/demo.js"></script>
 <script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
 </script>
 <!-- script agar alert otomatis hilang dengan sendirinya -->
 <script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000)
 </script>
 </body>

 </html>