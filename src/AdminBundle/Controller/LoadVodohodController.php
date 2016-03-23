<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\Common\Collections\ArrayCollection;

use BaseBundle\Entity\CruiseCruise;
use BaseBundle\Entity\CruiseShip;
use BaseBundle\Entity\Document;




class LoadVodohodController extends Controller
{
	const PATH_IMG = "/bundles/cruise/ship/";
	
	
	public function curl_get_file_contents($URL)
		{
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $URL);
			$contents = curl_exec($c);
			curl_close($c);

			if ($contents) return $contents;
				else return FALSE;
		}

    /**
	 * @Template()
	 * @Route("/admin/loadvodohod", name="loadvodohod" )
     */			
	public function indexAction()
	{ 
		
		$url_cruises = "http://cruises.vodohod.com/agency/json-cruises.htm?pauth=jnrehASKDLJcdakljdx";
		
		$cruises_json = $this->curl_get_file_contents($url_cruises);
		
		$url_motorships = "http://cruises.vodohod.com/agency/json-motorships.htm?pauth=jnrehASKDLJcdakljdx";
		
		$motorships_json = $this->curl_get_file_contents($url_motorships);
		
		$motorships = json_decode($motorships_json,true);

		//$cr = json_decode('['.$htm.']');
		$cruises_v = json_decode($cruises_json,true);
		
		foreach($cruises_v as &$cruise_v)
		{
			$cruise_v['motorship'] = $motorships[$cruise_v['motorship_id']]['name'];
		}
 
		
		$em = $this->getDoctrine()->getManager();
		$shipRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
		$classRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipClass');
		
		foreach($motorships as $motorship_id=>$motorship)
		{
			if($motorship_id == 29){
			
			$shipCode = $motorship['code'];
			$shipName = $motorship['name'];
			$shipBody = $motorship['description'];
			$classId = 4;
			$class = $classRepos->find($classId);
			
			$ship = $shipRepos->findOneByCode($shipCode);
			
			if ($ship != null) {
				$em->remove($ship);
				//FIXME: remove after Doctrine fix
				$em->flush();
			}
			
			$ship = new CruiseShip();
			
			// Копируем фотографии
			
			$dir = $this->container->getParameter('kernel.root_dir').'/../web'.self::PATH_IMG.$shipCode;
			if(!is_dir($dir)) mkdir($dir) ;
			$img_main = "http://vodohod.com/cruises/vodohod/".$shipCode."/".$shipCode."-main.jpg";
			$newfile = $dir.'/'.$shipCode.'-main.jpg';
			$file_content = $this->curl_get_file_contents($img_main);
			$fp = fopen($newfile, "w");
			$test = fwrite($fp, $file_content); // Запись в файл
			//if ($test) echo 'Данные в файл успешно занесены.';
			//else echo 'Ошибка при записи в файл.';
			fclose($fp); //Закрытие файла	

			$img_decks = "http://vodohod.com/cruises/vodohod/".$shipCode."/".$shipCode."-decks.gif";
			$newfile = $dir.'/'.$shipCode.'-decks.gif';
			$file_content = $this->curl_get_file_contents($img_decks);
			$fp = fopen($newfile, "w");
			$test = fwrite($fp, $file_content); // Запись в файл
			//if ($test) echo 'Данные в файл успешно занесены.';
			//else echo 'Ошибка при записи в файл.';
			fclose($fp); //Закрытие файла	
			
			/*
			$photos_url = "http://vodohod.com/cruises/vodohod/".$shipCode."/foto.htm";
			$photos_html = $this->curl_get_file_contents($photos_url );
			$photos_dom = new simple_html_dom($photos_html);
			
			echo $photos_url . '<hr><hr><hr>';
			
			foreach($photos_dom->find('a') as $e)
			{
				echo $e->href . '<hr>';
			}
			
			*/
			
			$ship->setImgurl(self::PATH_IMG.$shipCode.'-main.jpg');
			
			$ship->setCode($shipCode);
			$ship->setTitle($shipName);
			$ship->setClass($class);
			$ship->setProperties('');	
			
			$cruiseRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			$categoryRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruiseCategory');
			
			// Создать страницы с теплоходами!!!
			
			$docRepos = $this->getDoctrine()->getRepository('BaseBundle:Document');
			$docShip = $docRepos->findOneByUrl('/cruise/ship/'.$shipCode);
			
			
			
			if ($docShip != null) {
				$em->remove($docShip);
				//FIXME: remove after Doctrine fix
				$em->flush();
			}
			
			$categoryId = $this->getDoctrine()->getRepository('BaseBundle:DocumentCategory')->findOneById(1001);			
			
			
			$shipContent = $this->renderView('AdminBundle:LoadVodohod:shipPage.html.twig',array(
					'img_main'=>self::PATH_IMG.$shipCode.'/'.$shipCode.'-main.jpg',
					'ship_description' => $shipBody,
					'img_deck' => self::PATH_IMG.$shipCode.'/'.$shipCode.'-decks.gif',
					));
			
			$docShip = new Document();
			$docShip
				->setTitle($shipName)
				->setUrl('/cruise/ship/'.$shipCode)
				->setCategoryId($categoryId)
				->setBody($shipContent)
				->setIsactive(1)
				->setDeletable(0)
				->setArchieved(0)
				->setContentTitle($shipName)
				
			;	
			$em->persist($docShip);
			//$em->flush();
			
			// Создать массив ассоциаций категорий круизов
			
			foreach($cruises_v as $code=>$cruise_v)
			{
				if($cruise_v["motorship_id"] == $motorship_id )
				{
					$route = $cruise_v["name"];
					$startDate = strtotime($cruise_v["date_start"]);
					$endDate = strtotime($cruise_v["date_stop"]);
					$dayCount = $cruise_v["days"];
					$categoryIds = "";
					$burningcruise = 		0;
					$reductionprice =       0;
					$specialOffer =         0;
					
					$categoriesToAdd = new ArrayCollection();
					
					$cruise = $ship->addCruise($code,$categoriesToAdd);
					
					$cruise->setCode($code);
					$cruise->setShip($ship);
					$cruise->setRoute($route);
					$cruise->setStartDate($startDate);
					$cruise->setEndDate($endDate);
					$cruise->setRoute($route);
					$cruise->setDayCount($dayCount);
					$cruise->setDescription("");
					$cruise->setSpecialOffer($specialOffer);
					$cruise->setBurningCruise($burningcruise);
					$cruise->setReductionPrice($reductionprice);
					$em->persist($cruise);	
					
					
					
					
					// нужно создать все кабины, после чего создавать строки прайсов под эти кабины, причём создать их нужно при создании теплохода
					
					
					
					
					
					//$price_json = $this->curl_get_file_contents('http://cruises.vodohod.com/agency/json-prices.htm?pauth=jnrehASKDLJcdakljdx&cruise='.$code);
					//$price_v = json_decode($price_json,true);
					//$dump[] = $price_v;
					/*
					foreach($price_v['tariffs'] as $tariffs)
					{
					$tariffs_name = $tariffs['tariff_name'];
					
						foreach($tariffs['prices'] as $prices){
							
							$cabinTitle = $tariffs_name . $prices['deck_name'] . $prices['rt_name'] .$prices['rp_name']  ;
							
							$cabinPrice = $prices['price_value'];
							
							//$dump[] = array('name' => $cabinTitle, 'price'=>$cabinPrice);
							
							$cabin = $ship->addCabin($cabinTitle);
							$cabin->setDescription($cabinTitle.' descr');
								$price = $cabin->setPrice($cruise, $cabinPrice);
								$dump[] = $price;
								//$em->persist($price);							
							
							
						}

							
					}
					*/
					
				}
			}
			
			$em->persist($ship); 
			
			
			// теперь создадим цены 
			
			
			
			
			$em->flush(); // удалить
			
			};
			
		}
		
			

		
		return array('cruises'=>$cruises_v);
	}
}
