    <!-- Footer -->
    <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sidik Prasetyo <?= date('Y') ;?></span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>
    
    <!-- My Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/js/');?>script.js"></script>

    <script>
        $('.form-check-input').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url : "<?= base_url('admin/changeaccess');?>",
            type: 'post',
            data: {
            menuId:menuId,
            roleId:roleId
            },
            success: function(){
            document.location.href = "<?= base_url('admin/roleaccess/');?>" + roleId;
            }
            })
        });
    </script>

    <script>
        $(function () {
    $(".buttonAddRole").on("click", function () {
        $("#newRoleModalTitle").html("Add New Role");
        $(".modal-footer button[type=submit]").html("Add");
    });

    $(".editRole").on("click", function () {
        $("#newRoleModalTitle").html("Edit Role");
        $(".modal-footer button[type=submit]").html("Edit");
        $(".modal-body form").attr('action', '<?= base_url('admin/editrole');?>');

        const id = $(this).data("id"); // Pindahkan ke dalam event handler

        $.ajax({
            url: '<?= base_url('admin/geteditrole');?>',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#role').val(data.role);
                $('#id').val(data.id);
            }
        });
    });
});
    </script>

    <script>
        $(function () {
    $(".buttonAddMenu").on("click", function () {
        $("#newMenuModalTitle").html("Add New Menu");
        $(".modal-footer button[type=submit]").html("Add");
    });

    $(".buttonEditMenu").on("click", function () {
        $("#newMenuModalTitle").html("Edit Menu");
        $(".modal-footer button[type=submit]").html("Edit");
        $(".modal-body form").attr('action', '<?= base_url('menu/editmenu');?>');

        const id = $(this).data("id");

        $.ajax({
            url: '<?= base_url('menu/geteditmenu');?>',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#menu').val(data.menu);
                $('#id').val(data.id);
            }
        });
    });
});
    </script>

    <script>
        $(function () {
    $(".addMenu").on("click", function () {
        $("#newSubMenuModalTitle").html("Add New Sub Menu");
        $(".modal-footer button[type=submit]").html("Add");
    });

    $(".editSubMenu").on("click", function () {
        $("#newSubMenuModalTitle").html("Edit Sub Menu");
        $(".modal-footer button[type=submit]").html("Edit");
        $(".modal-body form").attr('action', '<?= base_url('menu/editsubmenu');?>');

        const id = $(this).data("id"); 
        
        $.ajax({
            url: '<?= base_url('menu/geteditsubmenu');?>',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#title').val(data.title);
                $('#menu_id').val(data.menu_id);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#is_active').prop('checked', data.is_active);
                $('#id').val(data.id);
            }
        });
    });
});
    </script>

    <script>
        // tombol hapus
$('.buttonDelete').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: "Are you sure?",
        text: "Field will be delete",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete"
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    });
});
    </script>

</body>

</html>