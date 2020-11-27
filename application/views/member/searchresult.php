<body>
		<div class="col-lg-12">
            <div class="panel-body">
            <form method="POST" action="<?php echo base_url() ?>index.php/controller_member/search">
                <div class="col-md-3 col-md-offset-6 col-xs-12">
                    <div class="form-group">
                        <select class="form-control" name="pilihan">
                            <option value="IDMember">Member's ID</option>
                            <option value="NamaMember">Member's Name</option>    
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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <strong>Member List</strong> | Total: <?php echo $jumlah; ?> 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Member</th>
    								<th>Nama Member</th>
    								<th>Alamat</th>
    								<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($member as $key) { ?>
                            		<tr>
                                    	<td><?php echo $key->IDMember; ?></td>
                                    	<td><?php echo $key->NamaMember; ?></td>
                                    	<td><?php echo $key->Alamat; ?></td>
                                    	<td><?php echo anchor('controller_member/edit/'.$key->IDMember, "<i class=\"fa fa-pencil-square-o\"></i>"); ?> | <?php echo anchor('controller_member/delete/'.$key->IDMember, "<i class=\"fa fa-trash\"></i>", "onclick=\"return confirm('Are you sure? Delete this data?');\""); ?></td>
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
    	<?php echo anchor('controller_member','Back', 'class="btn btn-outline btn-danger btn-xs"') ?>
    </div>
</body>