<body>
		<div class="col-lg-12">
            <div class="panel-body">
            <form method="POST" action="<?php echo base_url() ?>index.php/controller_buku/search">
                <div class="col-md-3 col-md-offset-6 col-xs-12">
                    <div class="form-group">
                        <select class="form-control" name="pilihan">
                            <option value="IDBuku">Book's ID</option>
                            <option value="Judul">Book's Title</option>    
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..." name="key">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Book List</strong> | Total: <?php echo $jumlah; ?> 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Buku</th>
    								<th>Judul Buku</th>
    								<th>Pengarang</th>
    								<th>Terbit</th>
    								<th>Jenis Buku</th>
    								<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($buku as $key) { ?>
                            		<tr>
                                    	<td><?php echo $key->IDBuku; ?></td>
                                    	<td><?php echo $key->Judul; ?></td>
                                    	<td><?php echo $key->Pengarang; ?></td>
                                    	<td><?php echo $key->Terbit; ?></td>
                                    	<td><?php echo $key->JenisBuku; ?></td>
                                    	<td><?php echo anchor('controller_buku/edit/'.$key->IDBuku, "<i class=\"fa fa-pencil-square-o\"></i>"); ?> | <?php echo anchor('controller_buku/delete/'.$key->IDBuku, "<i class=\"fa fa-trash\"></i>", "onclick=\"return confirm('Are you sure? Delete this data?');\""); ?></td>
                                	</tr>	
                            	<?php } ?>
                            </tbody>
                        </table>
                    </div>
                                <!-- /.table-responsive -->
                </div>
                            <!-- /.panel-body -->
            </div>
                        <!-- /.panel -->
        </div>
    <div>
    	<?php echo anchor('controller_buku','Back', 'class="btn btn-outline btn-danger btn-xs"') ?>
    </div>
</body>