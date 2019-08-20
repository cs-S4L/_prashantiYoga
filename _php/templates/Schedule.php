<?php

class Schedule extends Template {

	const requiredFields = array(
		'day',
		'time',
	);

	public $dynamicTemplateCount = true;
	
	protected $day;
	protected $time;

}