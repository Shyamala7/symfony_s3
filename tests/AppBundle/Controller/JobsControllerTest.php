<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/jobs', array(),
    array(),
    array('CONTENT_TYPE' => 'application/json'),
    '{
  "category_id":"1",
  "content": "Door Repair",
  "description":"Test",
  "region":"Hamburg",
  "zipcode":"022258",
  "images": ["xx"],
  "target_date_options":"Test",
  "target_date":"2018-06-20"

}');
        echo $client->getResponse();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
