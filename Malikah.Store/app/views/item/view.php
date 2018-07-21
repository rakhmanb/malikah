<h1><?php echo $item->rs['Name'] ?></h1>
<div class="row">
	<div class="col-md-6">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">

    <?php
    	for($i = 0; $i < sizeof($pictures); $i++)
    	{
    		if($i == 0)
    		{
    			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
    		}
    		else
    		{
    			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
    		}
    	}
    ?>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php
    	for($k = 0; $k < sizeof($pictures); $k++)
    	{
    		if($k == 0)
    		{
    			echo '    <div class="item active">
      <img style="height:260px;" src="'.myUrl('',true).$pictures[$k]->rs['Data'].'" alt="...">
    </div>';
    		}
    		else
    		{
    			echo '    <div class="item">
      <img style="height:260px;" src="'.myUrl('',true).$pictures[$k]->rs['Data'].'" alt="...">
    </div>';
    		}
    	}
    ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>
	<div class="col-md-6" style="text-align:center;">
		<div class="row">
		<h1><small>
			<?php
				setlocale(LC_MONETARY, 'en_US.UTF-8');
				$price = sprintf('$%01.2f', $item->rs['Price']);
				echo $price;
			?>
			</small></h1>
		</div>
		<div class="row">
			<a class="item-addtocartbtn">
				Add To Cart
			</a>
		</div>
	</div>
</div>
<div class="row" style="border-top:1px solid black; padding-top:10px; margin-top:20px;">
	<div class="col-md-12">
	<?php
		echo $item->rs['Description'];
		/*
		foreach($itemtypes as $item => $val)
		{
				echo 'Group: '.$item;
				foreach($val as $itemval)
				{
					echo ' '.$itemval['type'];
				}
		}
		*/
	?>
	</div>
</div>
