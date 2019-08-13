<?php if ($GLOBALS['LoggedIn']) {?>
<div class="cmsEditField"  data-field="<?= $this->field?>">
<?php }?>



<h2><?=$this->heading?></h2>

<p><?=$this->text?></p>



<?php if ($GLOBALS['LoggedIn']) {?>
</div>
<?php } ?>