<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
        <strong>Update Data</strong> | <?php echo anchor('controller_member','Cancel', 'class="btn btn-danger btn-xs"');  ?>
    </div>
    <?php  
        $data = $member->result()[0];
    ?>
    <div class="panel-body">
	<form role="form" method="POST" action="edit">
        <div class="form-group">
           	<label>ID Member</label>
            <input class="form-control" name="idmember" required="required" value="<?php echo $data->IDMember;?>">
        </div>
        <div class="form-group">
           	<label>Nama Member</label>
            <input class="form-control" name="nama" required="required" value="<?php echo $data->NamaMember;?>">
        </div>
        <div class="form-group">
   	    	<label>Alamat</label>
            <input class="form-control" name="alamat" required="required" value="<?php echo $data->Alamat;?>">
        </div>
        
        <input type="hidden" name="idmemberlama" value="<?php echo $data->IDMember;?>">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
    </div>
</div>
</body>
</html>


			