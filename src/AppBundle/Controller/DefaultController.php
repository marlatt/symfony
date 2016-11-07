<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/about/{name}", name="aboutpage", defaults={"name":null})
     */
    public function aboutAction($name)
    {
      if ($name) {
        $user = $this->getDoctrine()
          ->getRepository('AppBundle:User')
          ->findOneBy(array('name'=>$name));
        if (false === $user instanceof User) {
          throw $this->createNotFoundException(
            'No user named '.$name.' found!'
          );
        }
      }
      return $this->render('AppBundle:About:index.html.twig', array('user' => $user));
    }
}
