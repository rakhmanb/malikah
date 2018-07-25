<form action="<?php echo myUrl(''); ?>blog/update" method="post">
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="Title" name="Title" placeholder="Title" value="<?php echo $Title;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Post</label>
	<textarea name="Post">
	<?php echo $Post;?>
	</textarea>
  </div>
  <input type="hidden" name="Id" value="<?php echo $Id;?>">
  <button type="submit" class="btn btn-default">Update</button>
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