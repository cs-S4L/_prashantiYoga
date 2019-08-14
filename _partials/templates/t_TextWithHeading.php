<?php if ($GLOBALS['LoggedIn']) {?>
<div class="cmsEditField add" data-field="<?= $this->field?>" data-order="<?=$this->order?>" data-action="insert">
</div>
<div class="cmsEditField edit" data-field="<?= $this->field?>" data-order="<?=$this->order?>" data-action="edit">
<?php }?>



<h2><?=$this->heading?></h2>

<p><?=$this->text?></p>



<?php if ($GLOBALS['LoggedIn']) {?>
</div>
<div class="cmsEditField add" data-field="<?= $this->field?>" data-order="<?=$this->order + 1?>" data-action="insert">
</div>
<?php } ?>