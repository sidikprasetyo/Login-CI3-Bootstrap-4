

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ;?></h1>

                    <div class="row">
                        <div class="col-lg-6">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
                        </div>
                    </div>

                    <div class="card mb-3 col-lg-6">
                    <div class="row g-0">
                        <div class="col-md-4 mt-2 mb-2">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name'];?></h5>
                            <p class="card-text"><?= $user['email'];?></p>
                            <p class="card-text"><small class="text-body-secondary">Member since <?= date('d F Y', $user['date_created']);?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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