<?php

class Pricing extends Template {

	const requiredFields = array(
		'name',
		'hint',
		'price'
	);

	public $dynamicTemplateCount = true;

	protected $name;
	protected $hint;
	protected $price;
	
}