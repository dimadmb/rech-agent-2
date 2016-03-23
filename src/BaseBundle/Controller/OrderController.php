<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use BaseBundle\Entity\CruiseOrder;

class OrderController extends Controller
{
	
    /**
	 * @Template()
     */	
	public function indexAction($code = null, Request $request)
	{
		
		$repository = $this->getDoctrine()->getRepository('BaseBundle:Document');
		$url = "/cruise/order";
		$page = $repository->findOneByUrl($url);
		
		
		

		$order = new CruiseOrder();
		
		$form = $this->createFormBuilder($order)

				->add('name','text',array('label'=>'Фамилия, Имя, Отчество'))
				->add('phone','text',array('label'=>'Контактный телефон'))
				->add('button', 'submit',array('label' => 'Отправить заявку'))
				->add('cruisecode','hidden',array('data'=>$code))
				->getForm()
		;
/*
		if ($request->getMethod() == 'POST') {  
			$form->handleRequest($request);
			
			// отправим тут письмо
			
			//$order = new CruiseOrder();

			
			$em = $this->getDoctrine()->getManager();
			$em->persist($order);
			$em->flush();
			
		}*/
		
		
        if ($form->isSubmitted() && $form->isValid()) {
            $order
				->setCruisecode($form['code'])
				->setName($form['name'])
				->setPhone($form['phone'])
			;

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($order);
            $entityManager->flush();

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See http://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'post.created_successfully');
        }		

		$cruise = null;

		if($code != null)
		{
			
			$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			$cruise = $repository->findOneByCode($code);
	
		};
		
		
		
		

		
		//$form->getForm(); 
		
		return array('page' => $page,'form'=>$form->createView(),'cruise'=>$cruise);
	}
}
