<form id="collectionForm" action="<?php echo myUrl('',true).'collection/update'; ?>" method="post" enctype='multipart/form-data'>
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
          $catFound = false;
          for($j = 0; $j < sizeof($categorycollections[0]); $j++)
          {
            if($categorycollections[0][$j]->rs['CategoryId'] == $arrcategory[$i]->rs['Id'])
            {
              $catFound = true;
              break;
            }
          }

            echo "<div class='row'><div class='col-md-1'><input type=\"checkbox\" ".( $catFound ? "checked" : "")." value='".$arrcategory[$i]->rs['Id']."'  name=\"category[]\" aria-label=\"...\">".$arrcategory[$i]->rs['Name']."</div></div>";
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
  <input type="hidden" name="ShopId" value="<?php echo $collection->rs['ShopId'];?>">
  <input type="hidden" name="Id" value="<?php echo $collection->rs['Id'];?>">
  <input type="hidden" id="inputSeasonId" name="SeasonId" value="<?php echo $collection->rs['SeasonId'];?>">
</form>
<h2>Items: <small><a href='javascript:void(0)' data-toggle="modal" data-target="#myModal">Add Item+</a></small></h2>
<div class="items">
<?php

  if(sizeof($items[0]) == 0)
  {
    echo "<div>No Items available</div>";
  }
  
  for($i = 0; $i < sizeof($items[0]); $i++)
  {
    echo "<div class='row'><div class='col-md-3'>".$items[0][$i]->rs['Name']."</div><div class='col-md-3'>".$items[0][$i]->rs['Date']."</div><div class='col-md-3'><a class='editItemLink' data-itemid='".$items[0][$i]->rs['Id']."' href='javascript:void(0);'>Edit</a></div><div class='col-md-3'><a class='deleteItemLink' data-itemid='".$items[0][$i]->rs['Id']."' href='javascript:void(0);'>Delete</a></div></div>";
  }

?>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Item</h4>
      </div>
      <div class="modal-body">
      <form name="modalitemform" id='modalitemform'>
        <div class="form-group">
          <label for="exampleInputTitle">Name</label>
          <input type="text" class="form-control" id="NameItem" name="Name" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Price</label>
          $<input type="text" class="form-control" id="PriceItem" name="Price" placeholder="Price">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Available Inventory</label>
          <input type="text" class="form-control" id="AvailableInventoryItem" name="AvailableInventory" placeholder="Available Inventory">
        </div>  
        <div class="form-group">
          <label for="exampleInputTitle">Description</label>
          <textarea id='itemDescription' name="itemDescription">
          </textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Images</label>
          <div class="itemimages">No Images</div>
          <input type="file" name="filesImages[]" id="filesImagesItem" value="Select Images" multiple>
        </div>
        <input type="hidden" name="CollectionId" value="<?php echo $collection->rs['Id'];?>">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary item-save">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
      </div>
      <div class="modal-body">
      <form name="modalitemform" id='modalitemEditform'>
        <div class="form-group">
          <label for="exampleInputTitle">Name</label>
          <input type="text" class="form-control" id="NameEditItem" name="EditName" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Price</label>
          $<input type="text" class="form-control" id="PriceEditItem" name="EditPrice" placeholder="Price">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Available Inventory</label>
          <input type="text" class="form-control" id="AvailableInventoryEditItem" name="AvailableEditInventory" placeholder="Available Inventory">
        </div>  
        <div class="form-group">
          <label for="exampleInputTitle">Description</label>
          <textarea id='itemEditDescription' name="itemEditDescription">
          </textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Images</label>
          <div class="itemimagesEdit">No Images</div>
          <input type="file" id="filesImagesItemEdit" value="Select Images" multiple>
        </div>
        <input type="hidden" name="EditCollectionId" value="<?php echo $collection->rs['Id'];?>">
        <input type="hidden" name="EditItemId" id ="EditItemId" >
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary itemEdit-save">Save changes</button>
      </div>
    </div>
  </div>
</div>


<br>
  <button type="button" class="btn btn-default save">Save</button><button type="button" class="btn btn-default save-finish">Save and Finish</button>

	
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
  $(document).ready(function()
  {
    $("#seasondd li a[data-id=<?php echo $collection->rs['SeasonId']; ?>]").click();
    if($("#indefiniteChkBx").data("checked") === 1)
    {
      $("#indefiniteChkBx").attr("checked","true");
    }
  });


  var items = {};
  var numItems = 0;

  function Item()
  {

  }

  Item.prototype =
  {
    Name: null,
    Description: null,
    Price: null,
    AvailableInventory: null,
    Images: null,
    setFromJson: function(obj)
    {
      var jsonObj = JSON.parse(obj);
      this.Name = jsonObj.Name;
      this.Description = jsonObj.Description;
      this.Price = jsonObj.Price;
      this.AvailableInventory = jsonObj.AvailableInventory;
      this.Images = jsonObj.Images;
    }
  };


  $(".save-finish").bind("click", function(e)
  {
    document.getElementById("collectionForm").submit();
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


  $("#filesImagesItemEdit").bind("change", function(e)
  {
     var files = this.files;
     var reader = new FileReader();
     if($(".itemimagesEdit").text() === "No Images")
     {
        $(".itemimagesEdit").html("");
     }
     var i = 0;

     if(files[i])
     {

        reader.addEventListener("load", function () 
        {
            var divRadio = document.createElement("div");
            $(divRadio).addClass("Radio");
            var label = document.createElement("label");


            var inputElem = document.createElement("input");
            $(inputElem).attr("type","radio");
            $(inputElem).attr("name","imageCoverRadio");
            $(inputElem).attr("value","itemImageAdd"+(i+1));
            var hrefclick = document.createElement("a");
            $(hrefclick).attr("href","javascript:void(0);");
            $(hrefclick).html("Delete");            
            
            var elem = document.createElement("div");
            $(elem).addClass("imageitemAdd itemImageAdd"+(i+1));

            $(hrefclick).bind("click", function()
            {
              $(this).closest(".Radio").remove();
            });
            

            $(label).append(inputElem);
            $(label).append(elem);
            $(label).append(hrefclick);
            $(divRadio).append(label);
            $(".itemimagesEdit").append(divRadio);

            $(".itemImageAdd"+(i+1)).css("width","500px");
            $(".itemImageAdd"+(i+1)).css("height","320px");
            $(".itemImageAdd"+(i+1)).css("background-size","contain");
            $(".itemImageAdd"+(i+1)).css("background-repeat","no-repeat");

            $(".itemImageAdd"+(i+1)).css("background-image","url("+reader.result+")");
            $(".itemImageAdd"+(i+1)).data("fulldata", reader.result);

            i = i+1;

            if(files[i])
            {
              reader.readAsDataURL(files[i]);
            }

        }, false);
         
        reader.readAsDataURL(files[i]);
     }
  });


  $("#filesImagesItem").bind("change", function(e)
  {
     var files = this.files;
     var reader = new FileReader();
     $(".itemimages").html("");
     var i = 0;

     if(files[i])
     {

        reader.addEventListener("load", function () 
        {
            var divRadio = document.createElement("div");
            $(divRadio).addClass("Radio");
            var label = document.createElement("label");


            var inputElem = document.createElement("input");
            $(inputElem).attr("type","radio");
            $(inputElem).attr("name","imageCoverRadio");
            $(inputElem).attr("value","itemImage"+(i+1));
            
            
            var elem = document.createElement("div");
            $(elem).addClass("imageitem itemImage"+(i+1));
            

            $(label).append(inputElem);
            $(label).append(elem);
            $(divRadio).append(label);
            $(".itemimages").append(divRadio);

            $(".itemImage"+(i+1)).css("width","500px");
            $(".itemImage"+(i+1)).css("height","320px");
            $(".itemImage"+(i+1)).css("background-size","contain");
            $(".itemImage"+(i+1)).css("background-repeat","no-repeat");

            $(".itemImage"+(i+1)).css("background-image","url("+reader.result+")");
            $(".itemImage"+(i+1)).data("fulldata", reader.result);
            i = i+1;
            if(files[i])
            reader.readAsDataURL(files[i]);

        }, false);
         
        reader.readAsDataURL(files[i]);
     }
  });

  var tmpItem = new Item();
  
 function JsonEditItem(id)
 {
	  $.ajax(
	  {
  		url: '<?php echo myUrl('').'item/jsonedititem/'; ?>' + id,
  		type: 'GET',
  		success: function(data,msg,xhr)
  		{
  			var itemObj = JSON.parse(data);
  			$("#NameEditItem").val(itemObj.Item.Name);
  			$("#PriceEditItem").val(itemObj.Item.Price);
  			$("#AvailableInventoryEditItem").val(itemObj.Item.AvailableInventory);
        $("#EditItemId").val(itemObj.Item.Id);
  			
  			tinyMCE.get('itemEditDescription').setContent(itemObj.Item.Description)
  			$("#editItemModal").modal("show");
  			
  			if(itemObj.Photos.length > 0)
  			{
  				$(".itemimagesEdit").html("");
  			}
        else
        {
          $(".itemimagesEdit").html("No Images");
        }
  			
  			
  			for(var i = 0; i < itemObj.Photos.length; i++)
  			{

  	      var divRadio = document.createElement("div");
  			  $(divRadio).addClass("Radio");
  			  var label = document.createElement("label");


  			  var inputElem = document.createElement("input");
  			  $(inputElem).attr("type","radio");
  			  $(inputElem).attr("name","imageCoverRadio");
  			  $(inputElem).attr("value","itemImageExisting"+(itemObj.Photos[i].rs['Id']));
  			  
  			  if(itemObj.Photos[i].rs.Id === itemObj.Item.CoverPhotoId)
  			  {
  				  $(inputElem).attr("checked","checked");
  			  }
  			  
  			  
  			  var elem = document.createElement("div");
  			  $(elem).addClass("imageitemExist itemImageExisting"+(itemObj.Photos[i].rs['Id']));
  			  var hrefclick = document.createElement("a");
  			  $(hrefclick).attr("href","javascript:void(0);");
  			  $(hrefclick).html("Delete");

  			  $(label).append(inputElem);
  			  $(label).append(elem);
  			  $(label).append(hrefclick);
  			  $(divRadio).append(label);
  			  $(".itemimagesEdit").append(divRadio);
          $(elem).attr("data-photoid",itemObj.Photos[i].rs['Id']);

  			  $(".itemImageExisting"+(itemObj.Photos[i].rs['Id'])).css("width","500px");
  			  $(".itemImageExisting"+(itemObj.Photos[i].rs['Id'])).css("height","320px");
  			  $(".itemImageExisting"+(itemObj.Photos[i].rs['Id'])).css("background-size","contain");
  			  $(".itemImageExisting"+(itemObj.Photos[i].rs['Id'])).css("background-repeat","no-repeat");

  			  $(".itemImageExisting"+(itemObj.Photos[i].rs['Id'])).css("background-image","url('<?php echo myUrl('',true); ?>"+itemObj.Photos[i].rs.Data+"')");


          $(hrefclick).bind("click", function()
          {
            $(this).closest(".Radio").remove();
          });

  			}
  			
  		}
	  });	
 }
  
 function DeleterefreshCollectionItems(id)
{
  $.ajax(
  {
    url: '<?php echo myUrl('').'item/jsondeleterefresh/'; ?>'+id+'/<?php echo $collection->rs['Id']; ?>',
    type: 'POST',
    data: {
      "CollectionId": <?php echo $collection->rs['Id']; ?>
    },
    success: function(data,msg,xhr)
    {

      $('.items').html('');
      var dataArrRS = JSON.parse(data);

      if(dataArrRS.length === 0)
      {
        $('.items').html('<div>No Items available</div>');
      }

      for(var i = 0; i < dataArrRS.length; i++)
      {
        $(".items").append("<div class='row'><div class='col-md-3'>" + dataArrRS[i].rs['Name'] + "</div><div class='col-md-3'>" + dataArrRS[i].rs['Date'] + "</div><div class='col-md-3'><a class='editItemLink' data-itemid='"+dataArrRS[i].rs['Id']+"' href='javascript:void(0);'>Edit</a></div><div class='col-md-3'><a class='deleteItemLink' data-itemid='"+dataArrRS[i].rs['Id']+"' href='javascript:void(0);'>Delete</a></div></div>");
      }
	  
	  	$(".deleteItemLink").bind("click", function()
		{
			var itemid = $(this).data("itemid");
			DeleterefreshCollectionItems(itemid);
		});
		
		$(".editItemLink").bind("click", function()
		{
			var itemid = $(this).data("itemid");
			JsonEditItem(itemid);
		});
		
    }
  });
}

function refreshCollectionItems()
{
  $.ajax(
  {
    url: '<?php echo myUrl('').'item/jsonrefresh/'.$collection->rs['Id']; ?>',
    type: 'POST',
    data: {
      "CollectionId": <?php echo $collection->rs['Id']; ?>
    },
    success: function(data,msg,xhr)
    {

      $('.items').html('');
      var dataArrRS = JSON.parse(data);

      if(dataArrRS.length === 0)
      {
        $('.items').html('<div>No Items available</div>');
      }

      for(var i = 0; i < dataArrRS.length; i++)
      {
        $(".items").append("<div class='row'><div class='col-md-3'>" + dataArrRS[i].rs['Name'] + "</div><div class='col-md-3'>" + dataArrRS[i].rs['Date'] + "</div><div class='col-md-3'><a class='editItemLink' data-itemid='"+dataArrRS[i].rs['Id']+"' href='javascript:void(0);'>Edit</a></div><div class='col-md-3'><a class='deleteItemLink' data-itemid='"+dataArrRS[i].rs['Id']+"' href='javascript:void(0);'>Delete</a></div></div>");
      }
	  
	  $(".deleteItemLink").bind("click", function()
		{
			var itemid = $(this).data("itemid");
			DeleterefreshCollectionItems(itemid);
		});
		
		$(".editItemLink").bind("click", function()
		{
			var itemid = $(this).data("itemid");
			JsonEditItem(itemid);
		});
		
	
    }
  });
}

$(".editItemLink").bind("click", function()
{
	var itemid = $(this).data("itemid");
	JsonEditItem(itemid);
});

$(".deleteItemLink").bind("click", function()
{
	var itemid = $(this).data("itemid");
	DeleterefreshCollectionItems(itemid);
});

$(".item-save").bind("click", function()
{

  var itemForm = $('#modalitemform')[0];
  var formData = new FormData(itemForm);

  formData.set('itemDescription',tinyMCE.get('itemDescription').getContent());

  $.ajax(
  {
    url: '<?php echo myUrl('').'item/add'; ?>',
    type: 'POST',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data,msg,xhr)
    {
      refreshCollectionItems();
    }
  });

  $('#myModal').modal('hide');

});

$(".itemEdit-save").bind("click", function()
{

  var itemForm = $('#modalitemEditform')[0];
  var formData = new FormData(itemForm);

  formData.set('itemEditDescription',tinyMCE.get('itemEditDescription').getContent());
  var existingImages = $(".imageitemExist");
  var newImages = $(".imageitemAdd");

  for(var i = 0; i < existingImages.length; i++)
  {
    formData.set('existingImage[]',$(existingImages).eq(i).data('photoid'));
  }

  for(var j = 0; j < newImages.length; j++)
  {
    formData.set('newImage'+(j+1),$(newImages).eq(j).data('fulldata'));
  }

  $.ajax(
  {
    url: '<?php echo myUrl('').'item/update'; ?>',
    type: 'POST',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data,msg,xhr)
    {
      $("#itemimagesEdit").html("No Images");
    }
  });

  $('#editItemModal').modal('hide');

});

$('#myModal').on('hidden.bs.modal', function () {
    $("#NameItem").val('');
	$("#PriceItem").val('');
	$("#AvailableInventoryItem").val('');
	tinyMCE.get('itemDescription').setContent("");
	$(".itemimages").html('No Images');
	$("#filesImagesItem").val('');
})

</script>