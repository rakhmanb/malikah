<div class="row">

    <div class="col-md-6">
      <form action="<?php echo myUrl(''); ?>user/create" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Firstname">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Lastname">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="Email" name="Email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    <div class="col-md-6">
      Sign up to buy products
    </div>
    </div>

<script type="text/javascript">
	$(document).ready(function()
	{
		selectLink("signup");
	});
</script>
