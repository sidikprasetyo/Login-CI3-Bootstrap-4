

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ;?></h1>
                    
                    <div class="row">
                        <div class="col-lg-6">

                        <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>') ;?>

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>


                            <a href="" class="btn btn-primary mb-3 buttonAddRole" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($role as $r): ?>
                                <tr>
                                <th scope="row"><?= $i ;?></th>
                                <td><?= $r['role'] ;?></td>
                                <td>
                                    <a href="<?= base_url('admin/roleaccess/') . $r['id'];?>" class="badge badge-warning" >access</a>
                                    <a href="<?= base_url('admin/editrole/') . $r['id'];?>" class="badge badge-success editRole" data-toggle="modal" data-target="#newRoleModal" data-id="<?= $r['id'];?>">edit</a>
                                    <a href="<?= base_url('admin/deleterole/') . $r['id'];?>" class="badge badge-danger buttonDelete">delete</a>
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
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalTitle">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url('admin/role');?>">
      <div class="form-group">
        <input type="hidden" name="id" id="id">
        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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

