<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 12/11/2019
 * Time: 17:04
 */

namespace App\Tests\Controller;

use App\Controller\ApiEstacionController;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class ApiEstacionControllerTest
 *
 * @package App\Tests\Controller
 *
 * @coversDefaultClass \App\Controller\ApiEstacionController
 *
 */
class ApiEstacionControllerTest extends WebTestCase
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
     * Implements testGetEstacion200
     *
     * @covers ::getEstacion
     */
    public function testGetEstacion200(): void
    {
        $id = 1;
        self::$client->request(
            Request::METHOD_GET,
            ApiEstacionController::ESTACION_API_PATH . '/' .$id
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        self::assertJson($cuerpo);
        /** @var array $datos */
        $datos = json_decode($cuerpo, true);
        self::assertArrayHasKey('estacion', $datos);

        self::assertEquals($id, $datos['estacion']['id']);

    }

    /**
     * Implements testGetEstacion404
     * @throws \Exception
     * @return void
     * @covers ::getEstacion
     */
    public function testGetEstacion404(): void
    {

        $id =random_int(3000,50000);
        self::$client->request(
            Request::METHOD_GET,
            ApiEstacionController::ESTACION_API_PATH . '/' .$id
        );

        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

}
