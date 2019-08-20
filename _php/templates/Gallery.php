<?php 
class Gallery extends Template {

	const requiredFields = array(
		'imageIds',
	);

	public $allImages;
	public $images = [];
	public $thumbnailLink;
	public $dynamicTemplateCount = true;

	protected $imageIds;

	public function __construct($content, $field = null, $order = null) {
		parent::__construct($content, $field, $order);
		
		if (!is_array($this->imageIds)) {
			$this->imageIds = json_decode($this->imageIds);
		}

		$this->allImages = $GLOBALS['Content']->getAllImages();

		//code from stackoverflow.com
		//https://stackoverflow.com/questions/27794558/fetch-data-primary-key-value-as-the-index-for-the-associative-array
		$this->allImages = array_combine(
  			array_column($this->allImages, 'id'),
    		$this->allImages
		);

		if (is_array($this->imageIds)) {
			for($i=0; $i<count($this->imageIds);$i++) {
				if ($i == 0) {
					$this->thumbnailLink = $this->allImages[$this->imageIds[$i]]['link'];
				}
				$this->images[] = $this->allImages[$this->imageIds[$i]];
			}
		}
	}

	public function renderEditForm() {
		parent::renderEditForm();
	}

	public function idExists($id) {
		foreach($this->imageIds as $imageId) {
			if ($id == $imageId) {
				return true;
			}
		}

		return false;
	}

}