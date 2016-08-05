<?php

namespace GeoGuesserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use GeoGuesserBundle\Entity\Map;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GeoGuesserBundle::index.html.twig');
    }

    public function gameAction()
    {
        $em=$this->getDoctrine()->getManager();

        $map = $em->getRepository('GeoGuesserBundle:Map')->findOneRandom();
        // var_dump($map->getLng());
        // var_dump($map->getLat());
        // var_dump($map->getName());
    	// ici on injecte les valeur de la map
    	$lng =$map->getLng();
        $lat =$map->getLat();

        return $this->render('GeoGuesserBundle::game.html.twig',
        	array(        		  
	        	'lng'=>$lng,
	        	'lat'=>$lat,
        	)
        );
    }

    public function gameResultAction(Request $request)
    {
        //coordonée de la map a trouvé
        $geoLng = $request->request->get('geolng');
        $geoLat = $request->request->get('geolat');

        //coordonée soumis par l' utilisateur
    	$repLng = $request->request->get('lng');
    	$repLat = $request->request->get('lat');

        function get_distance_m($lat1, $lng1, $lat2, $lng2) {
            $earth_radius = 6378137;
            //Terre = sphère de 6378km de rayon
            $rlo1 = deg2rad($lng1); 
            $rla1 = deg2rad($lat1); 
            $rlo2 = deg2rad($lng2); 
            $rla2 = deg2rad($lat2); 
            $dlo = ($rlo2 - $rlo1) / 2; 
            $dla = ($rla2 - $rla1) / 2; 
            $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo ));
            $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
            return ($earth_radius * $d);
        }

        $distance = round(get_distance_m($geoLng, $geoLat, $repLng, $repLat) / 1000, 3);

        //attribution des points & cash 

        if($distance<=5000){
            $pts=1000;
            $cash=100;
        }
        elseif($distance<=2500){
            $pts=2500;
            $cash=250;
        }
        elseif($distance<=1000){
            $pts=5000;
            $cash=500;
        }
        elseif($distance<=500){
            $pts=10000;
            $cash=1000;
        }
        else{
            $pts=0;
            $cash=0;
        }

        return $this->render('GeoGuesserBundle::result.html.twig',
        	array(
                'distance'=>$distance,
	        	'geoLng'=>$geoLng,
	        	'geoLat'=>$geoLat,
                'repLng'=>$repLng,
                'repLat'=>$repLat,
                'pts'=>$pts,
                'cash'=>$cash,
        	)
        );
    }

    public function selectAction()
    {
        return $this->render('GeoGuesserBundle::add.html.twig',
            array()
        );
    }

    public function addAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $name = $request->request->get('name');
        $lng = $request->request->get('lng');
        $lat = $request->request->get('lat');

        //creation d'une nouvelle instance d'entité map
        $map = new map;
        $map->setName($name);
        $map->setLng($lng);
        $map->setLat($lat);

        $em->persist($map);
        $em->flush();

        $this->get('session')->getFlashBag()->set('success', 'point ajouté');

        return $this->render('GeoGuesserBundle::add.html.twig',
            array()
        );
    }
}
