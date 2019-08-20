<?php

class Text extends Template {

	const requiredFields = array(
		'text',
	);

	public $dynamicTemplateCount = true;
	
	protected $text;

}