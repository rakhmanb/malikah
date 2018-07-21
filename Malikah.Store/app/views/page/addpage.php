<form action="<?php echo myUrl(''); ?>page/add" method="post">
  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">DisplayName</label>
    <input type="text" class="form-control" id="DisplayName" name="DisplayName" placeholder="DisplayName">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
	<textarea name="Content">
	</textarea>
  </div>
  <input type="hidden" value="<?php echo $pagecategoryid; ?>" name="PageCategoryId">
  <button type="submit" class="btn btn-default">Create</button>
</form>

<script type='text/javascript'>
tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>