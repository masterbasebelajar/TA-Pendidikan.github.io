<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Users</h1>
</div>

<div class="row">

    <div class="col-lg-7">
        
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Users</h6>
            </div>
            <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
            <label for="varchar">Namalengkap <?php echo form_error('namalengkap') ?></label>
            <input type="text" class="form-control" name="namalengkap" id="namalengkap" placeholder="Namalengkap" value="<?php echo $namalengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Akses <?php echo form_error('akses') ?></label>
            <input type="text" class="form-control" name="akses" id="akses" placeholder="Akses" value="<?php echo $akses; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('isActive') ?></label>
            <input type="text" class="form-control" name="isActive" id="isActive" placeholder="Status" value="<?php echo $isActive; ?>" />
        </div>
	    <input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-secondary">Cancel</a>
	        </form>
            </div>
        </div>

    </div>
</div>

</div>
<!-- /.container-fluid -->