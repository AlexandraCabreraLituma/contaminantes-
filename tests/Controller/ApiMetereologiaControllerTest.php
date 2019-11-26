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



    /**
     * Implements testsearchBarometricPressureMetereology200
     * @throws \Exception
     * @return void
     * @covers ::searchBarometricPressureMetereology
     */
    public function testsearchBarometricPressureMetereology200(): void
    {

        $datos = [
            'initial_time_stamp' => '2017-08-16 14:00:00',
            'final_time_stamp' => '2017-08-16 16:00:00',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH . ApiMetereologiaController::PRESSURE,
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
     * Implements testsearchBarometricPressureMetereology404
     * @throws \Exception
     * @return void
     * @covers ::searchBarometricPressureMetereology
     */
    public function testsearchBarometricPressureMetereology404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-04-17 10:30:00-05',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH .ApiMetereologiaController::PRESSURE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

    /**
     * Implements testsearchMetereology200
     * @throws \Exception
     * @return void
     * @covers ::searchMetereology
     */
    public function testsearchMetereology200(): void
    {

        $datos = [
            'initial_time_stamp' => '2017-08-16 14:00:00',
            'final_time_stamp' => '2017-08-16 16:00:00',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH ,
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
     * Implements testsearchMetereology404
     * @throws \Exception
     * @return void
     * @covers ::searchMetereology
     */
    public function testsearchMetereology404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-04-17 10:30:00-05',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH ,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

    /**
     * Implements testsearchWindDirectionMetereology200
     * @throws \Exception
     * @return void
     * @covers ::searchWindDirectionMetereology
     */
    public function testsearchWindDirectionMetereology200(): void
    {

        $datos = [
            'initial_time_stamp' => '2017-08-16 14:00:00',
            'final_time_stamp' => '2017-08-16 16:00:00',
        ];

        self::$client->request(
            Request::METHOD_POST,
                ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH.
                    ApiMetereologiaController::WIND. ApiMetereologiaController::DIRECTION  ,
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
     * Implements testsearchWindDirectionMetereology404
     * @throws \Exception
     * @return void
     * @covers ::searchWindDirectionMetereology
     */
    public function testsearchWindDirectionMetereology404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-04-17 10:30:00-05',
        ];

        self::$client->request(
            Request::METHOD_POST,
                ApiMetereologiaController::METEREOLOGIA_API_PATH . ApiMetereologiaController::SEARCH.
                    ApiMetereologiaController::WIND. ApiMetereologiaController::DIRECTION  ,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }


}
