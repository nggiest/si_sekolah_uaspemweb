<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Update Data</strong> | <?php echo anchor('controller_jenis','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <?php  
        $data = $jns->result()[0];
    ?>
    <div class="panel-body">
	<form role="form" method="POST" action="edit">
        <div class="form-group">
           	<label>ID Jenis</label>
            <input class="form-control" name="idjenis" required="required" value="<?php echo $data->IDJenis;?>">
        </div>
        <div class="form-group">
           	<label>Jenis Buku</label>
            <input class="form-control" name="jenisbuku" required="required" value="<?php echo $data->JenisBuku;?>">
        </div>
        <input type="hidden" name="idjenislama" value="<?php echo $data->IDJenis;?>">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
    </div>
</div>
</body>
</html>


			