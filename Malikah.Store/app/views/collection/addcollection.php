<form id="collectionForm" action="<?php echo myUrl('',true).'collection/add'; ?>" method="post" enctype='multipart/form-data'>
  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" value="<?php echo $collection->rs['Name'];?>">
  </div>  
  <div class="form-group">
    <label for="exampleInputTitle">DisplayName</label>
    <input type="text" class="form-control" id="DisplayName" name="DisplayName" placeholder="DisplayName" value="<?php echo $collection->rs['DisplayName'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">Year</label>
    <input type="text" class="form-control" id="Year" name="Year" placeholder="Year" value="<?php echo $collection->rs['Year'];?>">
  </div>
  <div class="form-group">
    <div class="dropdown">
      <button id="dropdownselected" class="btn btn-default dropdown-toggle" type="button" Name='SeasonId' value="<?php echo $collection->rs['SeasonId'];?>" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Season
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" id='seasondd' aria-labelledby="dropdownMenu1">
        <?php
          $season = new Season();
          $sarr = $season->retrieve_many();
          for($i = 0; $i < sizeof($sarr); $i++)
          {
            echo "<li><a data-id='".$sarr[$i]->rs['Id']."' href='javascript:void(0);'>".$sarr[$i]->rs['Name']."</a></li>";
          }
        ?>
      </ul>
    </div>
  </div>
  <div class="form-group">
  <label for="exampleInputTitle">Indefinite</label>
    <input id="indefiniteChkBx" data-checked="<?php echo $collection->rs['Indefinite']; ?>" type="checkbox" name="Indefinite" aria-label="...">
  </div>
  <div class="form-group">
  <label for="exampleInputTitle">Categories</label>
    <div>
      <?php 
        $cats = new Category();
        $arrcategory = $cats->retrieve_many();

        for($i = 0; $i < sizeof($arrcategory); $i++)
        {

            echo "<div class='row'><div class='col-md-1'><input type=\"checkbox\" value='".$arrcategory[$i]->rs['Id']."'  name=\"category[]\" aria-label=\"...\">".$arrcategory[$i]->rs['Name']."</div></div>";
        }
      ?>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">Image</label>
    <?php
      if($collection->rs['Image'] == '')
      {
          echo "<div class='imageSelected'>- No Image Selected -</div>";
      }
      else
      {
          echo "<div class='imageSelected' style=\"width:500px; height: 320px; background-size:contain; background-repeat: no-repeat; background-image:url('".myUrl('',true).$collection->rs['Image']."')\"></div>";
      }
    ?>
    <input type="file" class="form-control" id="Image" name="Image" placeholder="Image" value="Select Image">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
  <textarea name="Description">
  <?php echo $collection->rs['Description']; ?>
  </textarea>
  </div>
  <input type="hidden" name="ShopId" value="3">
  <input type="hidden" id="inputSeasonId" name="SeasonId" value="<?php echo $collection->rs['SeasonId'];?>">
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

  $("#seasondd li a").on('click', function()
  {
      $('#dropdownselected').html($(this).text() + " <span class=\"caret\"></span>");
      $('#inputSeasonId').val($(this).data("id"));
  });


  $("#Image").bind("change", function(e)
  {
      var file = this.files[0];
      var reader  = new FileReader();
      $(".imageSelected").html("");

      reader.addEventListener("load", function () {
          $(".imageSelected").css("background-image","url("+reader.result+")");
      }, false);

      if (file) 
      {
        reader.readAsDataURL(file);
      }

      $(".imageSelected").css("width","500px");
      $(".imageSelected").css("height","320px");
      $(".imageSelected").css("background-size","contain");
      $(".imageSelected").css("background-repeat","no-repeat");
  });

</script>