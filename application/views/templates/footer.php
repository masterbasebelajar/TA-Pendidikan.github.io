   <!-- Footer -->
   <footer class="sticky-footer bg-white">
       <div class="container my-auto">
           <div class="copyright text-center my-auto">
               <span>Copyright &copy; Rizal Fauzi | <?= date('Y'); ?></span>
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

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Select "Log out" if you wish to exit the page.</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
               </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>



   <!-- MANGGIL JQUERY UNTUK CHECKED-->
   <script>
    // menambahkan script untuk tambahkan gambar
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });


        // menangkap elemen
        $('.form-check-input').on('click', function() {
            // mengambil data
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            // Menjalankan Ajax
            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    // menuId: << milik menuId dari Data:
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });

        });
   </script>

<!-- Show Password -->
   <script>
        $('.form-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.pw').attr('type', 'text');
            } else {
                $('.pw').attr('type', 'password');
            }
        });
   </script>

<!-- Sweet Alert -->
        <script src="<?= base_url(); ?>assets/alert/sweetalert2.all.min.js"></script>
        <script src="<?= base_url(); ?>assets/alert/myscript.js"></script>
<!-- Gambar Pop UP -->
<script type="text/javascript">
            // memanggil plugin magnific popup
            $('.portfolio-popup').magnificPopup({
                type: 'image',
                removalDelay: 300,
                mainClass: 'mfp-fade',
                gallery: {
                enabled: true
                },
                zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
                }
            });
            // memanggil datatable membuat callback datatable pada magnific popup agar gambar 
            // yang di munculkan sesuai pada saat pindah paginasi dari 1 ke 2 
            // dan seterusnya
            $(document).ready(function() {
                var table = $('#example').dataTable({
                "fnDrawCallback": function () {
                    $('.portfolio-popup').magnificPopup({
                    type: 'image',
                    removalDelay: 300,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300,
                        easing: 'ease-in-out',
                        opener: function (openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                        }
                    }
                    });
                    }
                });
            });

        </script>
</body>

</html>