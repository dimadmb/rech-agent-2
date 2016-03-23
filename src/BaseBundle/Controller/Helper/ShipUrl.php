<?php

namespace BaseBundle\Controller\Helper;

use BaseBundle\Entity;

class ShipUrl {
	
	private $shipCode;
	
	private function __construct(){}

	/**
	 * @param \BaseBundle\Entity\CruiseShip $ship
	 * @return \BaseBundle\Controller\Helper\ShipUrl
	 */
	public static function create(\BaseBundle\Entity\CruiseShip $ship) {
		$url = new ShipUrl();
		$url->shipCode = $ship->getCode();
		return $url;
	}
	
	/**
	 * @return the $shipUrl
	 */
	public function getShipCode() {
		return $this->shipCode;
	}
	
	/**
	 * @param string $url
	 * @return \BaseBundle\Controller\Helper\ShipUrl
	 */
	public static function parse($url) {
		$result = new ShipUrl();
		$result->shipCode = $url;
		return $result;
	}
	
	public function __toString() {
		return $this->shipCode;	
	}
	
}