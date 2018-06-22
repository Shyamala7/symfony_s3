<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class CategoryController extends Controller
{
  /**
  * @Route("/categories")
  * @Method("POST")
  */
  public function newAction(Request $request)
  {
   $data = new Category;
   $name = $request->get('name');

  $data->setName($name);
  $em = $this->getDoctrine()->getManager();
  $em->persist($data);
  $em->flush();
   return new Response(Response::HTTP_OK);
  }

  /**
  * @Route("/categories")
  * @Method("GET")
  */
  public function getAction()
   {
     $restresult = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();
       if ($restresult === null) {
         return new Response(Response::HTTP_NOT_ACCEPTABLE);
    }
       return $restresult;
   }
}


?>
