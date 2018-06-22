<!-- {
  "category_id":"1",
  "content": "Door Repair",
  "description":"Test",
  "region":"Hamburg",
  "zipcode":"022258",
  "images": ["xx"],
  "target_date_options":"Test",
  "target_date":"2018-06-20"

} -->
<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Jobs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class JobsController extends Controller
{
  /**
  * @Route("/jobs")
  * @Method("POST")
  */

  public function newAction(Request $request)
  {
   $data = new Jobs;

  // if(empty($name))
  // {
  //  return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
  // }
  $data->setName($request->get('name'););
  $data->setCategoryId($request->get('category_id');
  $data->setContent($request->get('content');
  $data->setRegion($request->get('region');
  $data->setZipcode($request->get('zipcode');
  $data->setDescription($request->get('description');
  $data->setImages($request->get('images');
  $data->setTargetDateOptions($request->get('target_date_options');
  $data->setTargetDate($request->get('target_date');
  $em = $this->getDoctrine()->getManager();
  $em->persist($data);
  $em->flush();
   return new Response(Response::HTTP_OK);
  }

}


?>
