<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 6/11/2019
 * Time: 9:18
 */

namespace App\Controller;
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
    const PARAMETROS_API_PATH='/api/v1/parametros';
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

        $query = $em->createQuery('SELECT parametros.contaminante,parametros.rango,parametros.bphi,  parametros.bplo, parametros.ihi, parametros.ilo,parametros.color
                                    FROM App\Entity\Parametros parametros 
                                    where parametros.contaminante LIKE :contaminanteId 
                                    and parametros.bplo<= :valor
                                    and parametros.bphi>= :valor
                                    ');

        $query->setParameter('contaminanteId','%'.$data['contaminanteId'].'%');
        $query->setParameter('valor',$data['valor']);

        /** * @var Parametros[] $parametros */
        $parametros = $query->getResult();
        $datos = array();
        if (!empty($parametros)){
            //(((ihi-ilo)/(bphi-bplo)*(valor-bplo)+ilo
           $parametros[0]['contaminante']=(($parametros[0]['ihi']-$parametros[0]['ilo'])/($parametros[0]['bphi']-$parametros[0]['bplo']))*
                                            ($data['valor']-$parametros[0]['bplo'])+
                                            $parametros[0]['ilo'];
            $parametros[0]['contaminante']=number_format($parametros[0]['contaminante'],3);
            $datos = ['contaminante'=>$data['contaminanteId'],
                'valor' => $parametros[0]['contaminante'],
                'rango' => $parametros[0]['rango'],
                'color' => $parametros[0]['color']];

        }

          return (empty($datos))
            ? $this->error404()
            : new JsonResponse(
                ['parametros'=>$data],
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