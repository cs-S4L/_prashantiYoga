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

	/**
	 * getter Method
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * getter Method
	 * @return string
	 */
	public function getSeoTitle() {
		return $this->seoTitle;
	}

	/**
	 * getter Method
	 * @return string
	 */
	public function getSeoDescription() {
		return $this->seoDescription;
	}

	/**
	 * getter Method
	 * @return string
	 */
	public function getSeoKeywords() {
		return $this->seoKeywords;
	}
	
	/**
	 * write a new Page to the Database
	 * @param [type] $name           [description]
	 * @param [type] $title          [description]
	 * @param string $seoTitle       [description]
	 * @param string $seoDescription [description]
	 * @param string $seoKeywords    [description]
	 */
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

	/**
	 * load a page from the database by its name
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function loadPageFromDB($name) {
		return $this->db->readFromDatabase(
			DBPages::TableName,
			DBPages::Name . " = '$name'"
		);
	}

	/** render the given Field to the page */
	public function getRenderedField($fieldName) {
		$this->content[$fieldName]->renderField();
	}
}