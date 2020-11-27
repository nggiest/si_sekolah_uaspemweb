<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Insert Data</strong> | <?php echo anchor('controller_buku','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <div class="panel-body">
	<form role="form" method="POST" action="add">
        <div class="form-group">
           	<label>ID Buku</label>
            <input class="form-control" name="idbuku" placeholder="Insert new book ID" required="required">
        </div>
        <div class="form-group">
           	<label>Judul Buku</label>
            <input class="form-control" name="judul" placeholder="Insert new Book' Title" required="required">
        </div>
        <div class="form-group">
   	    	<label>Pengarang</label>
            <input class="form-control" name="pengarang" placeholder="Insert new Book's creator" required="required">
        </div>
        <div class="form-group">
          	<label>Tahun Terbit</label>
            <input class="form-control" name="terbit" placeholder="Insert the book's Publication Year" required="required">
        </div>
        <div class="form-group">
            <label>Jenis Buku</label>
            <select class="form-control" name="idjenis">
            <?php foreach ($jenis as $key) { ?>
				<option value="<?php echo $key->IDJenis; ?>"><?php echo $key->JenisBuku; ?></option>
			<?php } ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
    </div>
</div>
</body>
</html>


			