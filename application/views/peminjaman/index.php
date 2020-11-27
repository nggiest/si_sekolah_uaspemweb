<body>
		<div class="col-lg-12">
            <?php echo anchor('controller_peminjaman/add', 'Borrow','class="btn btn-outline btn-primary btn-lg"'); ?>
            <?php echo anchor('controller_peminjaman/cariDataPeminjaman', 'Return','class="btn btn-outline btn-success btn-lg"'); ?>
            <br><br>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <strong>Book's Loan List</strong> | Total: <strong><?php echo $jumlah; ?></strong> peminjaman | Belum Kembali: <strong><?php echo $blmkembali; ?></strong> buku 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
    								<th>Nama Member</th>
    								<th>Tanggal Pinjam</th>
    								<th>Tanggal Harus Kembali</th>
    								<th>Status</th>
                                    <th>Denda</th>
    								<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($peminjaman as $key) { ?>
                            		<tr>
                                    	<td><?php echo $key->Judul; ?></td>
                                    	<td><?php echo $key->NamaMember; ?></td>
                                    	<td><?php echo $key->TanggalPinjam; ?></td>
                                    	<td><?php echo $key->TanggalHarusKembali; ?></td>
                                        <?php if ($key->TanggalKembali == null) { ?>
                                    	    <td class="text-danger">Un-Returned</td>
                                            <td><?php echo "----------"; ?></td>
                                            <td class="text-warning"> can't take action</td>
                                        <?php } else { ?>
                                            <td class="text-primary">Returned (<?php echo $key->TanggalKembali; ?>)</td>
                                            <td>Rp.<?php echo $key->Denda; ?>.00</td>
                                            <td>-- | <?php echo anchor('controller_peminjaman/delete/'.$key->IDPeminjaman, "<i class=\"fa fa-trash\"></i>", "onclick=\"return confirm('Are you sure? Delete this data?');\""); ?></td>
                                        <?php } ?>
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