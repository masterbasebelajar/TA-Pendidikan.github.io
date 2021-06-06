<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Komik <?= $judul; ?></h1>
        <!-- <a href="<?php base_url() ?>berobat/print" class="btn btn-primary btn-sm mb-2">Create</a> -->
        <?php echo anchor(site_url('tbcomedy/create'),'Create', 'class="btn btn-primary mb-2"'); ?>
        <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->
        <!-- <div class="col-md-3 text-right mb-3">
                <form action="<?php echo site_url('tbcomedy/index'); ?>" class="form-inline" method="get">
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
                foreach ($tbcomedy_data as $tbcomedy)
                {
                ?>
                <tr id="portfolio">
                    <td width="80px" align="center"><?php echo ++$start ?></td>
                    <td><?php echo $tbcomedy->namaComedy ?></td>
                    <td id="portfolio-item">
                        <a href="<?php echo base_url(); ?>assets/upload/<?php echo $tbcomedy->gambar; ?>" class="portfolio-popup">
                            <img src="<?php echo base_url(); ?>assets/upload/<?php echo $tbcomedy->gambar; ?>" width="100" height="95">
                        </a>
                    </td>
                    <td><?php echo $tbcomedy->jenisComedy ?></td>
                    <td><?php echo $tbcomedy->tipeComedy ?></td>
                    <td align="center"><?php echo $tbcomedy->qtyComedy ?></td>
                    <td><?php echo $tbcomedy->harga ?></td>
                    <td><?php echo $tbcomedy->ketComedy ?></td>
                    <td style="text-align:center">
                        <?php 
                        echo anchor(site_url('tbcomedy/read/'.$tbcomedy->idComedy),'Read', 'class="btn btn-primary btn-sm mb-2"'); 	echo '  '; 
                        echo anchor(site_url('tbcomedy/update/'.$tbcomedy->idComedy),'Update', 'class="btn btn-warning btn-sm mb-2"'); echo '  '; 
                        echo anchor(site_url('tbcomedy/delete/'.$tbcomedy->idComedy),'Delete', 'class="btn btn-danger btn-sm mb-2 tombol-hapus"');  echo '  '; 
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
            <?php echo anchor(site_url('tbcomedy/excel'), 'Excel', 'class="btn btn-secondary"'); ?>
            <?php echo anchor(site_url('tbcomedy/word'), 'Word', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</div>

</div>