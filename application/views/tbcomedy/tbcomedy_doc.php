<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbcomedy List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NamaComedy</th>
		<th>Gambar</th>
		<th>JenisComedy</th>
		<th>TipeComedy</th>
		<th>QtyComedy</th>
		<th>Harga</th>
		<th>KetComedy</th>
		
            </tr><?php
            foreach ($tbcomedy_data as $tbcomedy)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbcomedy->namaComedy ?></td>
		      <td><?php echo $tbcomedy->gambar ?></td>
		      <td><?php echo $tbcomedy->jenisComedy ?></td>
		      <td><?php echo $tbcomedy->tipeComedy ?></td>
		      <td><?php echo $tbcomedy->qtyComedy ?></td>
		      <td><?php echo $tbcomedy->harga ?></td>
		      <td><?php echo $tbcomedy->ketComedy ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>