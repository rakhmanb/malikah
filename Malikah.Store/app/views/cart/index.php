<h1>My Cart</h1>
<div class="watermark-cart"></div>

<script type="text/javascript">
  var elem = <?php echo $cartArray; ?>;
  if(elem.length === 0)
  {
    $(".watermark-cart").text("No Items in cart");
  }
</script>
