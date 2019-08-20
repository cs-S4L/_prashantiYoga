<ul class="galleryEditor">
	<?php foreach($this->allImages as $image) {?>
		<li class="item <?=($this->idExists($image['id'])) ? 'selected' : ''?>" data-id="<?=$image['id']?>">
			<img src="<?=$image['link']?>" alt="" class="galleryImg">
		</li>
	<?php }?>
	<input id="galerieValue" type="hidden" name="imageIds" value="">
</ul>