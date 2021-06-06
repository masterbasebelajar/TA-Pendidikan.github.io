<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Komik Baru <?= $judul; ?></h1>
</div>

<div class="row">

    <div class="col-lg-7">
        
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Komik Baru</h6>
            </div>
            <div class="card-body">
            <!-- <form action="<?php echo $action; ?>" method="post"> -->
            <?php echo form_open_multipart($action); ?>
                <div class="form-group">
                <label for="varchar">Nama Komik <?php echo form_error('namaAction') ?></label>
                <input type="text" class="form-control" name="namaAction" id="namaAction" value="<?php echo $namaAction; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Gambar <?php echo form_error('gambar') ?></label>
                    <input type="file" class="form-control" name="gambar" id="gambar" />
                </div>
                <div class="form-group">
                    <label for="varchar">Jenis Komik <?php echo form_error('jenisAction') ?></label>
                    <input type="text" class="form-control" name="jenisAction" id="jenisAction" value="<?php echo $jenisAction; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Tipe Komik <?php echo form_error('tipeAction') ?></label>
                    <input type="text" class="form-control" name="tipeAction" id="tipeAction" value="<?php echo $tipeAction; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Qty <?php echo form_error('qtyAction') ?></label>
                    <input type="text" class="form-control" name="qtyAction" id="qtyAction" value="<?php echo $qtyAction; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Harga <?php echo form_error('harga') ?></label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $harga; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Ket<?php echo form_error('ketAction') ?></label>
                    <input type="text" class="form-control" name="ketAction" id="ketAction" value="<?php echo $ketAction; ?> -" />
                </div>
                <input type="hidden" name="idAction" value="<?php echo $idAction; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('tbaction') ?>" class="btn btn-secondary">Cancel</a>
	        <!-- </form> -->
            <?php echo form_close();?>
            </div>
        </div>
        

    </div>
</div>

</div>
<!-- /.container-fluid -->