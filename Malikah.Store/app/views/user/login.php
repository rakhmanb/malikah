<?php
  if(isset($errors)) 
  {
    ?>
      <div style="color:red;">
        <?php echo $errors; ?>
      </div>
    <?php
  }
?>
<div class="row">

    <div class="col-md-8">
<form action="<?php echo myUrl(''); ?>user/login" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
  </div>
  <input type="hidden" id="returnurl" name="returnurl" value="<?php echo $returnurl; ?>">
  <input type="hidden" id="type" name="type" value="login">
  <button type="submit" class="btn btn-default">Login</button>
</form>
Don't have an account? - <a href="<?php echo myUrl(''); ?>user/signup">Make a new one</a>
</div>

</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		selectLink("login");
	});
</script>
