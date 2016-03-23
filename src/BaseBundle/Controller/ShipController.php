<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

 /**
 * @Route("/")
 */


class ShipController extends Controller
{

    /**
	 * @Template()
     */
	
	public function classlistAction()
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipClass');
		$classes = $repository->findAll();
		return  array('classes' => $classes);
	}	
    /**
	 * @Template()
     */
	
	public function alphabetlistAction()
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
		$ships = $repository->findBy(array(),array('title' => 'ASC' ));
		return  array('ships' => $ships);
	}	
	
	
}
