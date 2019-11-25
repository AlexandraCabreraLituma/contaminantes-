<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 25/11/2019
 * Time: 16:23
 */

namespace App\Tests\Controller;

use App\Controller\ApiMetereologiaController;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiMetereologiaControllerTest
 *
 * @package App\Tests\Controller
 *
 * @coversDefaultClass \App\Controller\ApiMetereologiaController
 *
 */
class ApiMetereologiaControllerTest extends WebTestCase
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
     * Implements testSearchTemperatureMetereology200
     * @throws \Exception
     * @return void
     * @covers ::searchTemperatureMetereology
     */
    public function testSearchTemperatureMetereology200(): void
    {

        $datos = [
            'initial_time_stamp' => '2017-08-16 14:00:00',
            'final_time_stamp'=>'2017-08-16 16:00:00',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH .ApiMetereologiaController::TEMPERATURE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosMeteorology = json_decode($cuerpo, true);

        self::assertArrayHasKey('metereologies', $datosMeteorology);

    }

    /**
     * Implements testSearchTemperatureMetereology404
     * @throws \Exception
     * @return void
     * @covers ::searchTemperatureMetereology
     */
    public function testSearchTemperatureMetereology404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-04-17 10:30:00-05',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH .ApiMetereologiaController::TEMPERATURE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }
}
