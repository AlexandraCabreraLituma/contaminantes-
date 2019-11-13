<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 12/11/2019
 * Time: 13:15
 */
namespace App\Controller;
use App\Entity\Estacion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class ApiEstacionController
 * @package App\Controller
 * @Route(path=ApiEstacionController::ESTACION_API_PATH, name="api_estacion_")
 *
 */
class ApiEstacionController extends AbstractController
{
    //ruta de la api de estacion
    const ESTACION_API_PATH='/api/v1/estacion';
    /**
     * @Route(path="/{id}", name="get_estacion", methods={ Request::METHOD_GET })
     * @param Estacion $estacion
     * @return JsonResponse
     */
    public function getEstacion(?Estacion $estacion = null): JsonResponse
    {
        return (null == $estacion)
            ? $this->error404()
            : new JsonResponse(['estacion' => $estacion], Response::HTTP_OK);
    }
    /**
     * @return JsonResponse
     ** @codeCoverageIgnore
     */
    private function error404() : JsonResponse
    {
        $mensaje=[
            'code'=> Response::HTTP_NOT_FOUND,
            'mensaje' => 'Not found resource not found'
        ];
        return new JsonResponse(
            $mensaje,
            Response::HTTP_NOT_FOUND
        );
    }
}