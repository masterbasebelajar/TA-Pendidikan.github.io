<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Users</h1>
        <!-- <a href="<?php base_url() ?>berobat/print" class="btn btn-primary btn-sm mb-2">Create</a> -->
        <?php echo anchor(site_url('users'),'Back', 'class="btn btn-secondary mb-2"'); ?>
        <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <!-- <th>No</th> -->
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Akses</th>
                    <th>Status</th>
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $namalengkap; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $password; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $akses; ?></td>
                    <td><?php echo $isActive; ?></td>
                    <!-- <td><?php echo $created_at; ?></td>
                    <td><?php echo $updated_at; ?></td> -->
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>