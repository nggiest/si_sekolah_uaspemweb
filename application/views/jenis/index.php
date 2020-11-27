<body>
		<div class="col-lg-12">
            <p><?php echo anchor('controller_jenis/add', 'Add new Item','class="btn btn-outline btn-primary btn-lg"'); ?></p>
            <div class="panel panel-red">
                <div class="panel-heading">
                    <strong>Book's Genre</strong> | Total: <?php echo $jumlah; ?> 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Jenis</th>
    								<th>Jenis Buku</th>
    								<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($jenis as $key) { ?>
                            		<tr>
                                    	<td><?php echo $key->IDJenis; ?></td>
                                    	<td><?php echo $key->JenisBuku; ?></td>
                                    	<td><?php echo anchor('controller_jenis/edit/'.$key->IDJenis, "<i class=\"fa fa-pencil-square-o\"></i>"); ?> | <?php echo anchor('controller_jenis/delete/'.$key->IDJenis, "<i class=\"fa fa-trash\"></i>", "onclick=\"return confirm('Are you sure? Delete this data?');\""); ?></td>
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
    	<?php echo $paging ?>
    </div>
</body>