
<form>
	<label for="heading">Überschrift</label>
	<input type="text" name="heading" value="<?=$this->heading?>">

	<label for="text">Text</label>
	<textarea name="text"><?=$this->text?></textarea>
	<input type="hidden" name="fieldName" value="<?= get_class($this)?>">
	<input type="submit" name="submit" value="change">
	<input type="submit" name="submit" value="abort">
</form>