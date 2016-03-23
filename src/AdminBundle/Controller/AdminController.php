<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class AdminController extends Controller
{
	
    /**
	 * @Template()
	 * @Route("/admin", name="admin" )
     */			
	public function indexAction()
	{
		
		return array();
	}
	

}
