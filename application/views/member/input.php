<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Insert Data</strong> | <?php echo anchor('controller_member','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <div class="panel-body">
	<form role="form" method="POST" action="add">
        <div class="form-group">
           	<label>ID Member</label>
            <input class="form-control" name="idmember" placeholder="Insert new Member ID" required="required">
        </div>
        <div class="form-group">
           	<label>Nama Member</label>
            <input class="form-control" name="nama" placeholder="Insert new Member's Name" required="required">
        </div>
        <div class="form-group">
   	    	<label>Alamat</label>
            <input class="form-control" name="alamat" placeholder="Insert new Member's Address" required="required">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
    </div>
</div>
</body>
</html>


			