<body>
<div class="panel panel-default">
	
    <?php if ($showblmkembali->num_rows() > 0) { ?>
        <?php  
            $data = $showblmkembali->result()[0];
        ?>
        <div class="panel-heading">
            <strong>Finding Result</strong> | <?php echo anchor('controller_peminjaman/cariDataPeminjaman','Find Again', 'class="btn btn-outline btn-primary btn-xs"');  ?>
        </div>
        <div class="panel-body">
        <form role="form" method="post" action="<?php echo base_url(); ?>index.php/controller_peminjaman/edit">

            <div class="form-group">
                <label>ID Buku</label>
                <input type="text" readonly="true" class="form-control" name="idbuku" value="<?php echo $data->IDBuku ?>" >
            </div>

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" readonly="true" class="form-control" name="judul" value="<?php echo $data->Judul ?>" >
            </div>

            <div class="form-group">
                <label>ID Member</label>
                <input type="text" readonly="true" class="form-control" name="idmember" value="<?php echo $data->IDMember ?>" >
            </div>

            <div class="form-group">
                <label>Nama Peminjam Buku</label>
                <input type="text" readonly="true" class="form-control" name="nama" value="<?php echo $data->NamaMember ?>" >
            </div>

            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="text" readonly="true" class="form-control" name="tglpinjam" value="<?php echo $data->TanggalPinjam ?>" >
            </div>

            <div class="form-group">
                <label>Tanggal Jatuh Tempo</label>
                <input type="text" readonly="true" class="form-control" name="tglhrskembali" value="<?php echo $data->TanggalHarusKembali ?>" >
            </div>

            <div class="form-group">
                <label>Status Pengembalian</label>
                <input type="text" readonly="true" class="form-control" name="status" value="<?php if ($data->TanggalKembali == null) {
                    echo "Un-Returned";
                } else {
                    echo "Returned";
                }

                ?>" >
            </div>
            <input type="hidden" name="idpeminjaman" value="<?php echo $data->IDPeminjaman ?>">
            <button type="submit" name="submit" class="btn btn-outline btn-success">Return this book now</button>

        </form>
        </div>
    <?php } else { ?>
        <div class="col-lg-12 col-md-12">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-warning fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        Data Not Found
                                        </div>
                                        <div>This book might has been returned or this data hasn't been created</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>index.php/controller_peminjaman/cariDataPeminjaman">
                                <div class="panel-footer">
                                    <span class="pull-left">Find Again</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
    <?php } ?>
    
</div>
</body>