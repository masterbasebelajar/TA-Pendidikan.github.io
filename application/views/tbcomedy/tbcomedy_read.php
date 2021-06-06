<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Komik Genre <?= $judul; ?></h1>
        <!-- <a href="<?php base_url() ?>berobat/print" class="btn btn-primary btn-sm mb-2">Create</a> -->
       
        <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Komik</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <!-- <th>No</th> -->
                    <th>Nama Komik</th>
                    <!-- <th>Gambar</th> -->
                    <th>Jenis Komik</th>
                    <th>Tipe Komik</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Ket</th>
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $namaComedy; ?></td>
                    <!-- <td><?php echo $gambar; ?></td> -->
                    <td><?php echo $jenisComedy; ?></td>
                    <td><?php echo $tipeComedy; ?></td>
                    <td><?php echo $qtyComedy; ?></td>
                    <td><?php echo $harga; ?></td>
                    <td><?php echo $ketComedy; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Card Gambar -->
<div class="card shadow mb-4 portfolio">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
    </div>
    <div class="card-body portfolio-item">
    <a href="<?php echo base_url(); ?>assets/upload/<?php echo $gambar; ?>" width="200" height="185"  class="portfolio-popup">
        <img src="<?php echo base_url(); ?>assets/upload/<?php echo $gambar; ?>" width="200" height="185">
    </a>
    </div>
</div>
<?php echo anchor(site_url('tbcomedy'),'Back', 'class="btn btn-secondary mb-2"'); ?>

</div>