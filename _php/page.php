<?php

class Page {

	private $db;
	private $contentObject;

	private $name;
	private $title;
	private $seoTitle;
	private $seoDescription;
	private $seoKeywords;
	private $content;


	public function __construct($db, $content, $name=null) {
		$this->db = $db;
		$this->contentObject = $content;

		if (! is_null($name)) {
			$page = $this->loadPageFromDB($name);

			$this->name = $page[0][DBPages::Name];
			$this->title = $page[0][DBPages::Title];
			$this->seoTitle = $page[0][DBPages::SeoTitle];
			$this->seoDescription = $page[0][DBPages::SeoDescription];
			$this->seoKeywords = $page[0][DBPages::SeoKeywords];

			$this->content = $this->contentObject->getPageContent($name);
		}
	}

	public function getTitle() {
		return $this->title;
	}

	public function getSeoTitle() {
		return $this->seoTitle;
	}

	public function getSeoDescription() {
		return $this->seoDescription;
	}

	public function getSeoKeywords() {
		return $this->seoKeywords;
	}
	
	public function addPage($name, $title, $seoTitle='', $seoDescription='', $seoKeywords='') {
		$data = [
			DBPages::Name => $name,
			DBPages::Title => $title,
			DBPages::SeoTitle => $seoTitle,
			DBPages::SeoDescription => $seoDescription,
			DBPages::SeoKeywords => $seoKeywords
		];

		return $this->db->insertIntoDatabase(DBPages::TableName, $data);
	}

	public function loadPageFromDB($name) {
		return $this->db->readFromDatabase(
			DBPages::TableName,
			DBPages::Name . " = '$name'"
		);
	}

	public function getRenderedField($fieldName) {
		foreach($this->content[$fieldName] as $templateObject) {
			$templateObject->renderTemplate();
		}
	}


}