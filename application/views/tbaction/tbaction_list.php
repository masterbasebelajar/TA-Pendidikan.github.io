<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Komik <?= $judul; ?></h1>
        <!-- <a href="<?php base_url() ?>berobat/print" class="btn btn-primary btn-sm mb-2">Create</a> -->
        <?php echo anchor(site_url('tbaction/create'),'Create', 'class="btn btn-primary mb-2"'); ?>
        <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->
        <!-- <div class="col-md-3 text-right mb-3">
                <form action="<?php echo site_url('tbaction/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tbcomdedy'); ?>" class="btn btn-secondary">Reset</a>
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
        <h6 class="m-0 font-weight-bold text-primary">Daftar Komik <?= $judul; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                    <th>No</th>
                    <th>Nama Komik</th>
                    <th>Gambar</th>
                    <th>Jenis Komik</th>
                    <th>Tipe Komik</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Ket</th>
                    <th>Action</th>
                </thead>
                <tbody>

                <?php
                foreach ($tbaction_data as $tbaction)
                {
                ?>
                <tr id="portofolio">
                    <td width="80px" align="center"><?php echo ++$start ?></td>
                    <td><?php echo $tbaction->namaAction?></td>
                    <td id="portfolio-item">
                        <a href="<?php echo base_url(); ?>assets/upload/<?php echo $tbaction->gambar; ?>" class="portfolio-popup">
                            <img src="<?php echo base_url(); ?>assets/upload/<?php echo $tbaction->gambar; ?>" width="100" height="95">
                        </a>
                    </td>
                    <td><?php echo $tbaction->jenisAction?></td>
                    <td><?php echo $tbaction->tipeAction?></td>
                    <td align="center"><?php echo $tbaction->qtyAction?></td>
                    <td><?php echo $tbaction->harga ?></td>
                    <td><?php echo $tbaction->ketAction?></td>
                    <td style="text-align:center">
                        <?php 
                        echo anchor(site_url('tbaction/read/'.$tbaction->idAction),'Read', 'class="btn btn-primary btn-sm mb-2"'); 	echo '  '; 
                        echo anchor(site_url('tbaction/update/'.$tbaction->idAction),'Update', 'class="btn btn-warning btn-sm mb-2"'); echo '  '; 
                        echo anchor(site_url('tbaction/delete/'.$tbaction->idAction),'Delete', 'class="btn btn-danger btn-sm mb-2 tombol-hapus"');  echo '  '; 
                        // if($users->isActive == 1){
                        //     echo anchor(site_url('users/nonaktif/'.$users->id_users),'Nonaktif', 'class="btn btn-success btn-sm mb-2"');
                        // }else{
                        //     echo anchor(site_url('users/aktivasi/'.$users->id_users),'Aktivasi', 'class="btn btn-success btn-sm mb-2"');
                        // }
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
            <?php echo anchor(site_url('tbhorror/excel'), 'Excel', 'class="btn btn-secondary"'); ?>
            <?php echo anchor(site_url('tbhorror/word'), 'Word', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</div>

</div>