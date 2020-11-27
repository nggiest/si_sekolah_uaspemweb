<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Insert your Book's Data</strong> | <?php echo anchor('controller_peminjaman','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url(); ?>index.php/controller_peminjaman/add">

        <div class="form-group">
            <label>ID Buku - Judul Buku</label>
            <select class="form-control" name="idbuku">
            <?php foreach ($buku as $key) { ?>
				<option value="<?php echo $key->IDBuku; ?>"><?php echo $key->IDBuku; ?> - <?php echo $key->Judul; ?></option>
			<?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>ID Member - Nama Member</label>
            <select class="form-control" name="idmember">
            <?php foreach ($member as $key) { ?>
                <option value="<?php echo $key->IDMember; ?>"><?php echo $key->IDMember; ?> - <?php echo $key->NamaMember; ?></option>
            <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Pinjam</label>
             <input type="text" readonly="true" class="form-control" name="tglpinjam" value="<?php echo $sekarang ?>" >
        </div>

        <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="text" readonly="true" class="form-control" name="tglhrskembali" value="<?php echo $kembali ?>" >
        </div>

        <button type="submit" name="submit" class="btn btn-outline btn-success">Loan Book now</button>
    </form>
    </div>
</div>
</body>