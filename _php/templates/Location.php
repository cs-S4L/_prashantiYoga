<?php

class Location extends Template {

	protected $requiredFields = array(
		'adress',
		'homepageUrl',
		'mapsUrl'
	);

	protected $adress;
	protected $homepageUrl;
	protected $mapsUrl;

	protected $dynamicTemplateCount = false;
}