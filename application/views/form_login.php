<div class="panel-heading">
     <h3 class="panel-title">Library Officer Login</h3>
</div>
<div class="panel-body">
    <form role="form" method="POST" action= "<?php echo base_url() ?>index.php/controller_auth/login">
    <fieldset>
        <div class="form-group">
            <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Password" name="password" type="password" value="">
        </div>
        <div class="checkbox">
        <label>
            <input name="remember" type="checkbox" value="" disabled>petugas1 | 123456 if you want to operate<br>
            <a href="http://leonard04.hol.es/">Go back!</a>
        </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">Sign in</button>
    </fieldset>
    </form>
</div>