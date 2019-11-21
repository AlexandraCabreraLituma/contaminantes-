<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 21/11/2019
 * Time: 17:44
 */

namespace App\Controller;

use App\Entity\Metereologia;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class ApiMetereologiaController
 * @package App\Controller
 * @Route(path=ApiMetereologiaController::METEREOLOGIA_API_PATH, name="api_metereologia_")
 *
 */
class ApiMetereologiaController extends AbstractController
{
    //ruta de la api de metereologias
    const METEREOLOGIA_API_PATH='/api/v1/metereologias';
    const SEARCH='/search';
    const TEMPERATURE='/temperature';

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/temperature", name="search_temperature", methods={"POST"})
     */
    public function searchAdvanceObservation(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT min(metereologia.tempaireMin) as minimo, avg(metereologia.tempaireAv) as promedio, max(metereologia.tempaireMax) as maximo 
                                    FROM App\Entity\Metereologia metereologia
                                    where metereologia.fechor>= :timeStampInitial 
                                    and metereologia.fechor<= :timeStampFinal 
                                    ');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        /** * @var Metereologia[] $metereologias */
        $metereologias = $query->getResult();
        return (empty($metereologias))
            ? $this->error404()
            : new JsonResponse(
                ['metereologias'=>$metereologias],
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