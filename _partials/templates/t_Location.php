<?php if ($GLOBALS['LoggedIn']) {?>
<div class="cmsEditField add" data-field="<?= $this->field?>" data-order="<?=$this->order?>" data-action="insert">
</div>
<div class="cmsEditField edit" data-field="<?= $this->field?>" data-order="<?=$this->order?>" data-action="edit">
<?php }?>



<h3>Kursort</h3>
<div class="row col-1">
	<div class="col-1">
		<p><?= $this->adress?>
			<?php if (!empty($this->homepageUrl)) {?>
			<br><a href="Test">Homepage</a>
			<?php } ?>
		</p>
	</div>
	<div class="col-1">
		<div class="iframeWrapper">
			<iframe src="<?= $this->mapsUrl?>" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>

<?php if ($GLOBALS['LoggedIn']) {?>
</div>
<div class="cmsEditField add" data-field="<?= $this->field?>" data-order="<?=$this->order + 1?>" data-action="insert">
</div>
<?php } ?>