<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Update Data</strong> | <?php echo anchor('controller_buku','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <?php  
        $data = $buku->result()[0];
    ?>
    <div class="panel-body">
	<form role="form" method="POST" action="edit">
        <div class="form-group">
           	<label>ID Buku</label>
            <input class="form-control" name="idbuku" required="required" value="<?php echo $data->IDBuku;?>">
        </div>
        <div class="form-group">
           	<label>Judul Buku</label>
            <input class="form-control" name="judul" required="required" value="<?php echo $data->Judul;?>">
        </div>
        <div class="form-group">
   	    	<label>Pengarang</label>
            <input class="form-control" name="pengarang" required="required" value="<?php echo $data->Pengarang;?>">
        </div>
        <div class="form-group">
          	<label>Tahun Terbit</label>
            <input class="form-control" name="terbit" required="required" value="<?php echo $data->Terbit;?>">
        </div>
        <div class="form-group">
            <label>Jenis Buku</label>
            <select class="form-control" name="idjenis">
            <option value="<?php echo $data->IDJenis; ?>"><?php echo $data->JenisBuku; ?></option>
            <?php foreach ($jenis as $key) { ?>
				<option value="<?php echo $key->IDJenis ; ?>"><?php echo $key->JenisBuku; ?></option>
			<?php } ?>
            </select>
        </div>
        <input type="hidden" name="idbukulama" value="<?php echo $data->IDBuku;?>">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
    </div>
</div>
</body>
</html>


			