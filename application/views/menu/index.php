

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ;?></h1>
                    
                    <div class="row">
                        <div class="col-lg-6">

                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ;?>

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>


                            <a href="" class="btn btn-primary mb-3 buttonAddMenu" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($menu as $m): ?>
                                <tr>
                                <th scope="row"><?= $i ;?></th>
                                <td><?= $m['menu'] ;?></td>
                                <td>
                                    <a href="<?= base_url('menu/editmenu/') . $m['id'];?>" class="badge badge-success buttonEditMenu" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $m['id']; ?>">edit</a>
                                    <a href="<?= base_url('menu/deletemenu/') . $m['id'];?>" class="badge badge-danger buttonDelete">delete</a>
                                </td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalTitle">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url('menu');?>">
      <div class="form-group">
        <input type="hidden" name="id" id="id">
        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>