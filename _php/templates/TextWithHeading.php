<?php

class TextWithHeading extends Template {

	const requiredFields = array(
		'heading',
		'text'
	);

	public $dynamicTemplateCount = false;
	
	protected $heading;
	protected $text;

}