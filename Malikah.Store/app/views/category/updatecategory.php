<form action="<?php echo myUrl(''); ?>category/update" method="post">
  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $category->rs['Name'] ?>" placeholder="Name">
  </div>
  <input type="hidden" value="<?php echo $category->rs['Id'] ?>" name="Id">
  <input type="hidden" value="3" name="ShopId">
  <button type="submit" class="btn btn-default">Update</button>
</form>