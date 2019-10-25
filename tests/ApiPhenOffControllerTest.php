<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 24/10/2019
 * Time: 11:55
 */

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class ApiPhenOffControllerTest
 *
 * @package App\Tests\Controller
 *
 * @coversDefaultClass \App\Controller\ApiPhenOffControllerTest
 */
class ApiPhenOffControllerTest extends WebTestCase
{

    /**
     * @var Client $client
     */
    private static $client;

    public static function setUpBeforeClass()
    {
        self::$client= static::createClient();

    }
}
