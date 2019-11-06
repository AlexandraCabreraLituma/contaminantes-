<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 6/11/2019
 * Time: 15:35
 */

namespace App\Tests\Controller;

use App\Controller\ApiParametrosController;
use phpDocumentor\Reflection\Types\Void_;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class ApiParametrosControllerTest
 *
 * @package App\Tests\Controller
 *
 * @coversDefaultClass \App\Controller\ApiParametrosController
 *
 */
class ApiParametrosControllerTest extends WebTestCase
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
     * Implements testgetCParametrosByContaminanteValor200
     * @throws \Exception
     * @return array
     * @covers ::getCParametrosByContaminanteValor
     */
    public function testgetCParametrosByContaminanteValor200(): array
    {

        $datos = [
            'contaminanteId'  => 'CO',
            'valor'=>'30',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiParametrosController::PARAMETROS_API_PATH. ApiParametrosController::SEARCH .ApiParametrosController::CONTAMINANTE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_OK,
            self::$client->getResponse()->getStatusCode()
        );
        $cuerpo = self::$client->getResponse()->getContent();
        $datosParametros = json_decode($cuerpo, true);
        return $datosParametros['parametros'];

    }

    /**
     * Implements testSearchAdvanceObservationByContaminante404
     * @throws \Exception
     * @return void
     * @covers ::getCParametrosByContaminanteValor
     */
    public function testgetCParametrosByContaminanteValor404(): void
    {
        $datos = [
            'contaminanteId'  => 'CO2',
            'valor'=>'30',
        ];

        self::$client->request(
            Request::METHOD_POST,
            ApiParametrosController::PARAMETROS_API_PATH. ApiParametrosController::SEARCH .ApiParametrosController::CONTAMINANTE,
            [], [], [], json_encode($datos)
        );
        self::assertEquals(
            Response::HTTP_NOT_FOUND,
            self::$client->getResponse()->getStatusCode()
        );

    }

}
