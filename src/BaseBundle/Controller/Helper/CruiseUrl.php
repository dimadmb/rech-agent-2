<?php

namespace BaseBundle\Controller\Helper;

use BaseBundle\Entity;

class CruiseUrl {
	
	private $shipCode;
	private $code;
	
	private function __construct(){}

	public static function create(\BaseBundle\Entity\CruiseCruise $cruise) {
		$url = new CruiseUrl();
		$url->shipCode = $cruise->getShip()->getCode();
		$url->code = $cruise->getCode();
		return $url;
	}
	
	/**
	 * @return the $shipUrl
	 */
	public function getShipCode() {
		return $this->shipCode;
	}

	/**
	 * @return the $startDate
	 */
	public function getCode() {
		return $this->code;
	}

	public static function parse($url) {
		$result = new CruiseUrl();
		$expl = explode("_", $url);
		$result->shipCode = "";
		foreach($expl as $i=>$part) {
			if ($i == 0) {
				$result->shipCode .= $part;
			} elseif ($i < sizeof($expl) - 1) {
				$result->shipCode .= "_" . $part;
			} else {
				$result->code = $part;
			}
		}
		return $result;
	}
	
	public function __toString() {
		return $this->shipCode . "_" . $this->code;	
	}
	
	public function checkShip(Entity\CruiseShip $ship) {
		return $this->shipCode == $ship->getCode();
	}
	
	
	public function equals($to) {
		if (!$to instanceof CruiseUrl) {
			return false;
		}
		return $to->__toString() == $this->__toString();
		
	}
	
}