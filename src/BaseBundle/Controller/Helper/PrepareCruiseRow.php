<?php
namespace BaseBundle\Controller\Helper;

use BaseBundle\Entity;

class PrepareCruiseRow {

	public static function prepare(Entity\CruiseCruise $cruise, $cat = false) {
		$wrap = new \stdClass();
		$wrap->route = $cruise->getRoute();
		$wrap->ship = $cruise->getShip()->getTitle();
		$wrap->start = date("d.m.Y", $cruise->getStartdate());
		$wrap->end = date("d.m.Y", $cruise->getEnddate());
		$wrap->startFull = date("d.m.Y", $cruise->getStartdate());
		$wrap->endFull = date("d.m.Y", $cruise->getEnddate());
		$wrap->days = $cruise->getDaycount();
		$wrap->shipUrl = ShipUrl::create($cruise->getShip());
		$minprice = $cruise->getMinprice();
		$wrap->minprice = $minprice < 1 ? "-" : $minprice . "&nbsp;руб.";
		$wrap->cruiseUrl = CruiseUrl::create($cruise);
		
		$wrap->specialoffer =   $cruise->getSpecialoffer();
		$wrap->burningCruise = $cruise->getBurningCruise();
		$wrap->reductionPrice = $cruise->getReductionPrice();
		/*if($cat) {
			$category = $cruise->getCategory()->Category;
			
			$wrap->categoryUrl = CruiseCategoryUrl::create($category);
			
		}*/
		return $wrap;
	}
	
	public static function prepareForShip(Entity\CruiseCruise $cruise) {
		$wrap = new \stdClass();
		$wrap->route = $cruise->getRoute();
		$wrap->start = date("d.m.Y", $cruise->getStartdate());
		$wrap->end = date("d.m.Y", $cruise->getEnddate());
		$wrap->days = $cruise->getDaycount();
		$minprice = $cruise->getMinprice();
		$wrap->minprice = $minprice < 1 ? "-" : $minprice . "&nbsp;руб.";
		$wrap->url = CruiseUrl::create($cruise);
		return $wrap;
	}
	
}