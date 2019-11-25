<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 29/10/2019
 * Time: 10:43
 */

namespace App\Tests\Controller;

use App\Controller\ApiObservationController;
use phpDocumentor\Reflection\Types\Void_;
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
            'Id'=>'O3',
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
            'Id'=>'asasasas',
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

    /**
     * Implements testGetCMaxHour200
     * @throws \Exception
     * @return array
     * @covers ::getCMaxHour
     */

    public function testGetCMaxHour200(): array
    {

        self::$client->request(
            Request::METHOD_GET,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::MAXHOUR );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosObservation = json_decode($cuerpo, true);
        return $datosObservation['observations'];

    }



    /**
     * Implements testSearchAdvanceObservationStadistic200
     * @throws \Exception
     * @return array
     * @covers ::searchAdvanceObservationStadistic
     */

    public function testSearchAdvanceObservationStadistic200(): array
    {

        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
            'O3Id'=>'O3',
            'SO2Id'=>'SO2',
            'PM2_5Id'=>'PM2_5',
            'COId'=>'CO',
            'NO2Id'=>'NO2'
            //"O3Id":"O3","SO2Id":"SO2","PM2_5Id":"PM2_5","COId":"CO","NO2Id":"NO2"
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH  .ApiObservationController::STADISTIC.ApiObservationController::GENERAL,
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
     * Implements testSearchAdvanceObservationStadistic404
     * @throws \Exception
     * @covers ::searchAdvanceObservationStadistic
     */
    public function testSearchAdvanceObservationStadistic404(): void
    {

        $datos = [
            'initial_time_stamp' => '2029-05-17 10:11:00-05',
            'final_time_stamp'=>'2029-05-17 10:30:00-05',
            'O3Id'=>'O3',
            'SO2Id'=>'SO2',
            'PM2_5Id'=>'PM2_5',
            'COId'=>'CO',
            'NO2Id'=>'NO2'
            //"O3Id":"O3","SO2Id":"SO2","PM2_5Id":"PM2_5","COId":"CO","NO2Id":"NO2"
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH .ApiObservationController::STADISTIC. ApiObservationController::GENERAL,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );
    }

    /**
     * Implements testsearchAdvanceObservation200
     * @throws \Exception
     * @return array
     * @covers ::searchAdvanceObservation
     */

    public function testsearchAdvanceObservation200(): array
    {
        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::SEARCH,
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
     * Implements testSearchAdvanceObservation404
     * @throws \Exception
     * @return void
     * @covers ::searchAdvanceObservation
     */

    public function testSearchAdvanceObservation404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-05-17 10:30:00-05',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::SEARCH ,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }


    /**
     * Implements testSearchICA200
     * @throws \Exception
     * @return array
     * @covers ::searchICA
     */

    public function testSearchICA200(): array
    {
        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::SEARCH. ApiObservationController::ICA,
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
     * Implements testSearchICA404
     * @throws \Exception
     * @return void
     * @covers ::searchICA
     */
    public function testSearchICA404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-05-17 10:30:00-05',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::SEARCH .  ApiObservationController::ICA,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }


    /**
     * Implements testStadisticObservationModa200
     * @throws \Exception
     * @return void
     * @covers ::stadisticObservationModa
     */
    public function testStadisticObservationModa200(): void
    {

        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
            'Id'=>'NO2',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::STADISTIC .ApiObservationController::MODA,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosObservation = json_decode($cuerpo, true);

        self::assertArrayHasKey('observations', $datosObservation);

    }

    /**
     * Implements testStadisticObservationModa404
     * @throws \Exception
     * @return void
     * @covers ::stadisticObservationModa
     */
    public function testStadisticObservationModa404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-05-17 10:30:00-05',
            'Id'=>'NO2QQQWQE',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::STADISTIC .ApiObservationController::MODA,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }
    /**
     * Implements teststadisticObservationStandardDesviation200
     * @throws \Exception
     * @return void
     * @covers ::stadisticObservationStandardDesviation
     */
    public function teststadisticObservationStandardDesviation200(): void
    {

        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
            'Id'=>'NO2',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::STADISTIC .ApiObservationController::STANDARD_DESVIATION,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosObservation = json_decode($cuerpo, true);

        self::assertArrayHasKey('observations', $datosObservation);

    }

    /**
     * Implements teststadisticObservationStandardDesviation404
     * @throws \Exception
     * @return void
     * @covers ::stadisticObservationStandardDesviation
     */
    public function teststadisticObservationStandardDesviation404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-05-17 10:30:00-05',
            'Id'=>'NO2QQQWQE',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::STADISTIC .ApiObservationController::STANDARD_DESVIATION,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

    /**
     * Implements teststadisticObservationVariance200
     * @throws \Exception
     * @return void
     * @covers ::stadisticObservationVariance
     */
    public function teststadisticObservationVariance200(): void
    {

        $datos = [
            'initial_time_stamp' => '2018-05-17 10:11:00-05',
            'final_time_stamp'=>'2018-05-17 10:30:00-05',
            'Id'=>'NO2',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::STADISTIC .ApiObservationController::VARIANCE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosObservation = json_decode($cuerpo, true);

        self::assertArrayHasKey('observations', $datosObservation);

    }

    /**
     * Implements teststadisticObservationVariance404
     * @throws \Exception
     * @return void
     * @covers ::stadisticObservationVariance
     */
    public function teststadisticObservationVariance404(): void
    {

        $datos = [
            'initial_time_stamp' => '3019-05-17 10:11:00-05',
            'final_time_stamp'=>'3019-05-17 10:30:00-05',
            'Id'=>'NO2QQQWQE',
        ];
        self::$client->request(
            Request::METHOD_POST,
            ApiObservationController::OBSERVATION_API_PATH . ApiObservationController::STADISTIC .ApiObservationController::VARIANCE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

}
