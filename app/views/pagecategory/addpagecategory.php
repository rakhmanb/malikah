<form action="<?php echo myUrl(''); ?>pagecategory/add" method="post">
  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">DisplayName</label>
    <input type="text" class="form-control" id="DisplayName" name="DisplayName" placeholder="DisplayName">
  </div>
  <button type="submit" class="btn btn-default">Create</button>
</form>