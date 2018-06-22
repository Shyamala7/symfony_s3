<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Jobs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
// use AppBundle\Service\AmazonS3Service;

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
    try {
      $data = new Jobs;
      // print_r($request->request['category_id']);
      // exit();
     if(empty($request->get('category_id')) || empty($request->get('content')) || empty($request->get('region')) || empty($request->get('zipcode')) || empty($request->get('description')) || empty($request->get('images')) ||  empty($request->get('target_date_options')))
     {
       $response = new JsonResponse();
       $response->setData(array('message' => "NULL VALUES ARE NOT ALLOWED"));
       $response->setStatusCode(Response::HTTP_NOT_ACCEPTABLE);
       return $response;
     }


// print_r($this->get('AmazonS3Service'));
// die();
$storage = $this->get('AmazonS3Service');

// Upload a file with the content "content text" and the MIME-Type text/plain
#$storage->upload('test.txt', 'content text', ['contentType' => 'text/plain']);

// Upload a local existing File and let the service automatically detect the mime type.
// print_r($request->request->get('category_id'));
// exit();
#$storage->uploadFile('file path' . 'demo.pdf');

     $data->setCategoryId($request->get('category_id'));
     $data->setContent($request->get('content'));
     $data->setRegion($request->get('region'));
     $data->setZipcode($request->get('zipcode'));
     $data->setDescription($request->get('description'));
     $data->setImages($request->get('images'));
     $data->setTargetDateOptions($request->get('target_date_options'));
     #$data->setTargetDate($request->get('target_date'));
     $em = $this->getDoctrine()->getManager();
     $em->persist($data);
     $em->flush();



      $response = new JsonResponse();
      $response->setData(array('message' => "Jobs posted successfully"));
      $response->setStatusCode(Response::HTTP_OK);
      return $response;

    } catch (\Exception $e) {
        print_r($e);
        $response = new JsonResponse();
        $response->setData(array('message' => 'Err'));
        $response->setStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        return $response;
    }

  }

}


?>
