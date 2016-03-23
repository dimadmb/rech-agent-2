<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
 /**
 * @Route("/")
 */

class DocumentCategoryController extends Controller
{


	
    /**

	 * @Template()
     */		
	
	public function documentsAction($first = null, $second = null) {
		$repository = $this->getDoctrine()->getRepository('BaseBundle:DocumentCategory');
		$url = "/" . $first . "/" . $second . "/";
		$category = $repository->findOneByBaseurl($url);
		if ($category == null) {
			throw $this->createNotFoundException("Страница $url.html не найдена.");
		}		
		$documents = $category->getDocuments();
		if ($documents == null) {
			throw $this->createNotFoundException("Страница $url.html не найдена.");
		}
		//$bean = new \stdClass();
		//$bean->category = $category;
		//$bean->documents = $documents;
		
		//return $this->render("BaseBundle:Document:documents", array("bean" => $bean));
		return array("documents" => $documents, "category" => $category, );
	}	
	
}
