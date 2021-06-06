<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Users</h1>
        <!-- <a href="<?php base_url() ?>berobat/print" class="btn btn-primary btn-sm mb-2">Create</a> -->
        <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary mb-2"'); ?>
        <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->
        <!-- <div class="col-md-3 text-right mb-3">
                <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('users'); ?>" class="btn btn-secondary">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <!-- <th>Password</th> -->
                    <th>Email</th>
                    <th>Akses</th>
                    <th>Status</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
                    <th>Action</th>
                    <th>Hak Akses</th>
                </thead>
                <tbody>

                <?php
                foreach ($users_data as $users)
                {
                ?>
                <tr>
                    <td width="20px" align="center"><?php echo ++$start ?></td>
                    <td><?php echo $users->namalengkap ?></td>
                    <td><?php echo $users->username ?></td>
                    <!-- <td><?php echo $users->password ?></td> -->
                    <td><?php echo $users->email ?></td>
                    <td align="center">
                    <?php 
                    // Mengubah akses dari angka menjadi text [NOTE: SAYA BEDA DENGAN PAK ANAS]
                     if($users->akses == 1){
                        echo "Admin";
                     }
                     elseif($users->akses == 2){
                        echo "Guest";
                     }else{
                        echo "-";
                     }
                     ?></td>
                    <td align="center"><?php 
                     if($users->isActive == 1){
                        echo "Aktif";
                     }else{
                        echo "Belum Aktif";
                     }
                     ?></td>
                    <td style="text-align:center" width="250px">
                        <?php 
                        echo anchor(site_url('users/read/'.$users->id_users),'Read', 'class="btn btn-primary btn-sm mb-2"'); 	echo '  '; 
                        echo anchor(site_url('users/update/'.$users->id_users),'Update', 'class="btn btn-warning btn-sm mb-2"'); echo '  '; 
                        echo anchor(site_url('users/delete/'.$users->id_users),'Delete', 'class="btn btn-danger btn-sm mb-2 tombol-hapus"');  echo '  '; 
                        if($users->isActive == 1){
                            echo anchor(site_url('users/nonaktif/'.$users->id_users),'Nonaktif', 'class="btn btn-success btn-sm mb-2"');
                        }else{
                            echo anchor(site_url('users/aktivasi/'.$users->id_users),'Aktivasi', 'class="btn btn-success btn-sm mb-2"');
                        }
                        ?>
                    </td>
                    <td style="text-align:center">
                        <?php 
                            if($users->akses == 1){
                                echo anchor(site_url('users/guest/'.$users->id_users),'Guest', 'class="btn btn-info btn-sm mb-2"');
                            }else{
                                echo anchor(site_url('users/admin/'.$users->id_users),'Admin', 'class="btn btn-secondary btn-sm mb-2"');
                            }
                        
                        ?>
                    </td>
		        </tr>
                <?php
                }
                ?>

                </tbody>
            </table>
        </div>
        

        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            <?php echo anchor(site_url('users/excel'), 'Excel', 'class="btn btn-secondary"'); ?>
            <?php echo anchor(site_url('users/word'), 'Word', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</div>

</div>