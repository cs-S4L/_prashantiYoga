<?php

class Location extends Template {

	const requiredFields = array(
		'adress',
		'homepageUrl',
		'mapsUrl'
	);

	public $dynamicTemplateCount = false;
	
	protected $adress;
	protected $homepageUrl;
	protected $mapsUrl;

}