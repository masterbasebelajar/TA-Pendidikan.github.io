<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Komik</h1>
</div>

<div class="row">

    <div class="col-lg-7">
        
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Komik </h6>
            </div>
            <div class="card-body">
            <!-- <form action="<?php echo $action; ?>" method="post"> -->
            <?php echo form_open_multipart($action); ?>
                <div class="form-group">
                <label for="varchar">Nama Komik <?php echo form_error('namaHorror') ?></label>
                <input type="text" class="form-control" name="namaHorror" id="namaHorror" value="<?php echo $namaHorror; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Gambar <?php echo form_error('gambar') ?></label><br>
                    <img src="<?php echo base_url(); ?>assets/upload/<?php echo $gambar; ?>" width="125" height="100">
                    <input type="file" class="form-control" name="gambar" id="gambar" />
                </div>
                <div class="form-group">
                    <label for="varchar">Jenis Komik <?php echo form_error('jenisHorror') ?></label>
                    <input type="text" class="form-control" name="jenisHorror" id="jenisHorror" value="<?php echo $jenisHorror; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Tipe Komik <?php echo form_error('tipeHorror') ?></label>
                    <input type="text" class="form-control" name="tipeHorror" id="tipeHorror" value="<?php echo $tipeHorror; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Qty <?php echo form_error('qtyHorror') ?></label>
                    <input type="text" class="form-control" name="qtyHorror" id="qtyHorror" value="<?php echo $qtyHorror; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Harga <?php echo form_error('harga') ?></label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $harga; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Ket<?php echo form_error('ketHorror') ?></label>
                    <input type="text" class="form-control" name="ketHorror" id="ketHorror" value="<?php echo $ketHorror; ?>" />
                </div>
                <input type="hidden" name="idHorror" value="<?php echo $idHorror; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('tbhorror') ?>" class="btn btn-secondary">Cancel</a>
	        <!-- </form> -->
            <?php echo form_close();?>
            </div>
        </div>
        <!-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
            </div>
            <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                <label for="varchar">Gambar <?php echo form_error('gambar') ?></label><br>
                <img src="<?php echo base_url(); ?>assets/upload/<?php echo $gambar; ?>" width="200" height="195">
                <input type="file" class="form-control" name="gambar" id="gambar" />
                </div>
                
            <?php echo form_close();?>
            </div>
        </div> -->
        

    </div>
</div>

</div>
<!-- /.container-fluid -->