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
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Namalengkap</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Akses</th>
		<th>IsActive</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $users->namalengkap ?></td>
		      <td><?php echo $users->username ?></td>
		      <td><?php echo $users->password ?></td>
		      <td><?php echo $users->email ?></td>
		      <td><?php echo $users->akses ?></td>
		      <td><?php echo $users->isActive ?></td>
		      <td><?php echo $users->created_at ?></td>
		      <td><?php echo $users->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>