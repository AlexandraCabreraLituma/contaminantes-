<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 29/10/2019
 * Time: 10:43
 */

namespace App\Tests\Controller;

use App\Controller\ApiObservationController;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class ApiObservationControllerTest
 *
 * @package App\Tests\Controller
 *
 * @coversDefaultClass \App\Controller\ApiObservationController
 *
 */
class ApiObservationControllerTest extends WebTestCase
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
     * Implements testSearchAdvanceObservationByContaminante200
     * @throws \Exception
     * @return array
     * @covers ::searchAdvanceObservationByContaminante
     */

    public function testSearchAdvanceObservationByContaminante200(): array
    {

        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
            'O3Id'=>'O3',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::SEARCH .ApiObservationController::CONTAMINANTE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosObservation = json_decode($cuerpo, true);
        return $datosObservation['observations'];

    }

    /**
     * Implements testSearchAdvanceObservationByContaminante404
     * @throws \Exception
     * @return void
     * @covers ::searchAdvanceObservationByContaminante
     */

    public function testSearchAdvanceObservationByContaminante404(): void
    {

        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
            'O3Id'=>'asasasas',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::SEARCH .ApiObservationController::CONTAMINANTE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }


}
