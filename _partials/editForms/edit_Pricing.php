<label for="name">Name:</label>
<input type="text" name="name" value="<?=$this->writeToForm('name')?>">

<label for="hint">Hinweis:</label>
<textarea name="hint" rows="6"><?=$this->writeToForm('hint')?></textarea>

<label for="price">Preis:</label>
<input type="text" name="price" value="<?=$this->writeToForm('price')?>">