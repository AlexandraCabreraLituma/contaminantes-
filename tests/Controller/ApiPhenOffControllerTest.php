<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 24/10/2019
 * Time: 11:55
 */

namespace App\Tests\Controller;

use App\Controller\ApiPhenOffController;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class ApiPhenOffControllerTest
 *
 * @package App\Tests\Controller
 *
 * @coversDefaultClass \App\Controller\ApiPhenOffController
 */
class ApiPhenOffControllerTest extends WebTestCase
{

    /**
     * @var Client $client
     */
    private static $client;

    public static function setUpBeforeClass()
    {
        self::$client = static::createClient();

    }

    /**
     * Implements testGetCWeightPolar200
     *
     * @covers ::getCWeightPolar
     */
    public function testGetCWeightPolar200(): void
    {
        $id = 'SO2';
        self::$client->request(
            Request::METHOD_GET,
            ApiPhenOffController::PHENOFF_API_PATH . ApiPhenOffController::WEIGHTPOLAR . '/' .$id
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        self::assertJson($cuerpo);
        /** @var array $datos */
        $datos = json_decode($cuerpo, true);
        self::assertArrayHasKey('phenoff', $datos);

    }

    /**
     * Implements testGetCWeightPolar404
     *
     * @covers ::getCWeightPolar
     */
    public function testGetCWeightPolar404(): void
    {
        $id = 'asdasd';
        self::$client->request(
            Request::METHOD_GET,
            ApiPhenOffController::PHENOFF_API_PATH . ApiPhenOffController::WEIGHTPOLAR . '/' .$id
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

    /**
     * Implements testGetPhenOff200
     *
     * @covers ::getCPhenOff
     */
    public function testGetPhenOff200(): void
    {
        $id = 'SO2';
        self::$client->request(
            Request::METHOD_GET,
            ApiPhenOffController::PHENOFF_API_PATH . '/' .$id
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        self::assertJson($cuerpo);
        /** @var array $datos */
        $datos = json_decode($cuerpo, true);
        self::assertArrayHasKey('phenoff', $datos);

        self::assertEquals($id, $datos['phenoff']['phenomenonId']);

    }

    /**
     * Implements testGetPhenOff404
     *
     * @covers ::getCPhenOff
     */
    public function testGetPhenOff404(): void
    {
        $id = 'asdasd';
        self::$client->request(
            Request::METHOD_GET,
            ApiPhenOffController::PHENOFF_API_PATH .  '/' .$id
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

}
