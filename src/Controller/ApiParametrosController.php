<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 5/11/2019
 * Time: 17:55
 */

namespace App\Controller;


use App\Entity\Parametros;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiParametrosController
 * @package App\Controller
 * @Route(path=ApiParametrosController::PARAMETROS_API_PATH, name="api_parametros_")
 *
 */
class ApiParametrosController extends AbstractController
{
    //ruta de la api de observation
    const OBSERVATION_API_PATH='/api/v1/observations';
    const SEARCH='/search';
    const CONTAMINANTE='/contaminante';

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/contaminante", name="search_contaminante", methods={"POST"})
     */
    public function getCParametrosByContaminanteValor(Request $request):Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);

        $query = $em->createQuery('SELECT parametros 
                                    FROM App\Entity\Parametros parametros 
                                    where parametros.contaminante= :contaminante 
                                    and parametros.bplo>= :valor
                                    and parametros.bphi<= :valor  
                                    ');
        $query->setParameter('contaminante',$data['contaminante']);
        $query->setParameter('valor',$data['valor']);

        /** * @var Parametros[] $parametros */
        $parametros = $query->getResult();

        return (empty($parametros))
            ? $this->error404()
            : new JsonResponse(
                ['parametros'=>$parametros],
                Response::HTTP_OK);
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