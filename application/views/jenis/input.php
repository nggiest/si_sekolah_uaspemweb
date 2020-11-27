<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Insert Data</strong> | <?php echo anchor('controller_jenis','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <div class="panel-body">
	<form role="form" method="POST" action="add">
        <div class="form-group">
           	<label>ID Jenis</label>
            <input class="form-control" name="idjenis" placeholder="Insert new book's genre ID" required="required">
        </div>
        <div class="form-group">
            <label>Jenis Buku</label>
            <input class="form-control" name="jenisbuku" placeholder="Insert new book's genre Name" required="required">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
    </div>
</div>
</body>
</html>


			