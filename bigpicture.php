<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php
	$data = array('a' => '1', 'b' => '2');
	$json = json_encode($data);
	$json = json_decode($json);
	
	echo '<pre>';
	print_r($json);

	?>
		<div class="container" id="image_container">
			<h3>
				Remote Images
			</h3>
			<p>
				Click thumbnails to load larger images. Loading spinner &amp; captions are built-in.
			</p>
			<div class="flex">
				<img src="images/img1_thumb.jpg">
			</div>
		</div>
		<script src="js/BigPicture.min.js">
		</script> 
		<script>
		 (function() {
		 	function setClickHandler(id, fn) {
		      document.getElementById(id).onclick = fn;
		    }
		 	setClickHandler('image_container', function(e) {
		      e.target.tagName === 'IMG' && BigPicture({
		        el: e.target,
		        imgSrc: e.target.src.replace('_thumb', '')
		      });
		    });
		 })();
		</script>
	</body>
</html>