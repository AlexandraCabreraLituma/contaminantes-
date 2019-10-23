<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 21/10/2019
 * Time: 10:31
 */

namespace App\Controller;
use App\Entity\Observation;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiObservationController
 * @package App\Controller
 * @Route(path=ApiObservationController::OBSERVATION_API_PATH, name="api_observation_")
 *
 */
class ApiObservationController extends AbstractController
{
    //ruta de la api de observation
    const OBSERVATION_API_PATH='/api/v1/observations';


    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search", name="search", methods={"POST"})
     */
    public function searchAdvanceObservation(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);

        $query = $em->createQuery('SELECT observation.timeStamp,observation.phenomenonId, observation.valor FROM App\Entity\Observation observation where observation.timeStamp>= :timeStampInitial and observation.timeStamp<= :timeStampFinal ORDER BY observation.timeStamp ASC');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);

        /** * @var Observation[] $observations */
        $observations = $query->getResult();

        return (empty($observations))
            ? $this->error404()
            : new JsonResponse(
                ['observations'=>$observations],
                Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/contaminante", name="search_contaminantes", methods={"POST"})
     */
    public function searchAdvanceObservationByContaminante(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);

        $query = $em->createQuery('SELECT observationO3.timeStamp, observationO3.valor FROM 
                                                  App\Entity\Observation observationO3  
                                                  where observationO3.timeStamp>= :timeStampInitial 
                                                  and observationO3.timeStamp<= :timeStampFinal
                                                  and observationO3.phenomenonId LIKE :O3Id                                                
                                                  ');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        $query->setParameter('O3Id','%'.$data['O3Id'].'%');
        //$query->setParameter('COId','%'.$data['COId'].'%');

        /** * @var Observation[] $observations */
        $observations = $query->getResult();

        return (empty($observations))
            ? $this->error404()
            : new JsonResponse(
                ['observations'=>$observations],
                Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/stadistic", name="search_stadistic", methods={"POST"})
     */
    public function searchAdvanceObservationStadistic(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);

        $query = $em->createQuery('SELECT observation.phenomenonId, max(observation.valor) as maximo, min(observation.valor) as minimo, avg(observation.valor) as promedio  FROM 
                                                  App\Entity\Observation observation  
                                                  where observation.timeStamp>= :timeStampInitial 
                                                  and observation.timeStamp<= :timeStampFinal
                                                  and (observation.phenomenonId LIKE :O3Id
                                                  or observation.phenomenonId LIKE :SO2Id
                                                  or observation.phenomenonId LIKE :PM2_5Id
                                                  or observation.phenomenonId LIKE :COId
                                                  or observation.phenomenonId LIKE :NO2Id
                                                  )                                                
                                                  group by observation.phenomenonId');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        $query->setParameter('O3Id','%'.$data['O3Id'].'%');
        $query->setParameter('SO2Id','%'.$data['SO2Id'].'%');
        $query->setParameter('PM2_5Id','%'.$data['PM2_5Id'].'%');
        $query->setParameter('COId','%'.$data['COId'].'%');
        $query->setParameter('NO2Id','%'.$data['NO2Id'].'%');



        /** * @var Observation[] $observations */
        $observations = $query->getResult();

        return (empty($observations))
            ? $this->error404()
            : new JsonResponse(
                ['observations'=>$observations],
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