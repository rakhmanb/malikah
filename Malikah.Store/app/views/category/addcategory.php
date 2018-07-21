<form action="<?php echo myUrl(''); ?>category/add" method="post">
  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
  </div>
  <input type="hidden" value="3" name="ShopId">
  <button type="submit" class="btn btn-default">Create</button>
</form>