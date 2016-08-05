<?php

namespace GeoGuesserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfilController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('GeoGuesserBundle:User')->findOneById($user->getId());
        
        

        return $this->render('GeoGuesserBundle::profil.html.twig', array(
            'user' => $user,
    ));
    }

}