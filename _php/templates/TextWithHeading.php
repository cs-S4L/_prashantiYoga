<?php

class TextWithHeading extends Template {

	protected $requiredFields = array(
		'heading',
		'text'
	);

	protected $heading;
	protected $text;

	protected $dynamicTemplateCount = false;
}