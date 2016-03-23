<?php

namespace BaseBundle\Controller\Helper;

use BaseBundle\Entity;

class CruiseCategoryUrl {
	private $cruiseTitle;
	
	private function __construct(){}

	public static function create(\BaseBundle\Entity\CruiseCruiseCategory $category) {
		$url = new CruiseCategoryUrl();
		$url->cruiseTitle = $category->getId();
		return $url;
	}
	
	public static function parse($url) {
		$result = new CruiseCategoryUrl();
		$result->cruiseTitle = $url;
		return $result;
	}
	
	public function __toString() {
		return $this->cruiseTitle;
	}
}