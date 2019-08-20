<div class="col-2">
	<div class="thumbnail" style="background-image: url('<?=$this->thumbnailLink?>');">
	</div>
	
	<p class="openGallery" data-gallery="gallery<?=$this->order?>">mehr...</p>
</div>

<div id="gallery<?=$this->order?>" class="gallery">
	<i class="fas fa-times close"></i>
	<div class="wrapper-large">
		<i class="prev fas fa-arrow-circle-left"></i>
		<ul class="large">
			<?php foreach($this->images as $image) {?>
			<li>
				<img src="<?=$image['link']?>" alt="" class="galleryImg" data-id="<?= $image['id']?>">
			</li>
			<?php }?>
		</ul>
		<i class="next fas fa-arrow-circle-right"></i>
	</div>

	<div class="wrapper-thumbs">
		<i class="prev fas fa-arrow-circle-left"></i>
		<ul class="thumbs">

		</ul>
		<i class="next fas fa-arrow-circle-right"></i>
	</div>
</div>