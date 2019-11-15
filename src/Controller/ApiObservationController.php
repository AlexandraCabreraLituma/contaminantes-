<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 21/10/2019
 * Time: 10:31
 */
namespace App\Controller;
use App\Entity\Observation;

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
    const SEARCH='/search';
    const CONTAMINANTE='/contaminante';
    const MAXHOUR='/maxHour';
    const STADISTIC='/stadistic';
    const BASIC='/basic';
    const MODA='/moda';
    const ICA='/ICA';
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
        $query = $em->createQuery('SELECT observationO3.timeStamp, observationO3.valor 
                                                    FROM App\Entity\Observation observationO3  
                                                    where observationO3.timeStamp>= :timeStampInitial 
                                                    and observationO3.timeStamp<= :timeStampFinal
                                                    and observationO3.phenomenonId LIKE :O3Id
                                                    ');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        $query->setParameter('O3Id','%'.$data['O3Id'].'%');
        /*
        $query->setParameter('COId','%'.$data['COId'].'%');
        $query->setParameter('SO2Id','%'.$data['SO2Id'].'%');
        $query->setParameter('PM2_5Id','%'.$data['PM2_5Id'].'%');
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
     * @param Request $request
     * @return Response
     * @Route(path="/stadistic/general", name="stadistic_general", methods={"POST"})
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
                                                  or observation.phenomenonId LIKE :NO2Id)
                                                  group by observation.phenomenonId ');
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
     * @param Request $request
     * @return Response
     * @Route(path="/search/ICA", name="search_ICA", methods={"POST"})
     */
    public function searchICA(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT observation.phenomenonId , avg(observation.valor) as promedio  
                                    FROM App\Entity\Observation observation 
                                    where observation.timeStamp>= :timeStampInitial 
                                        and observation.timeStamp<= :timeStampFinal 
                                    group by observation.phenomenonId');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        /** * @var Observation[] $observations */
        $observations = $query->getResult();
        if (!empty($observations)){
            for ($i = 0; $i <= 4; $i++){
                $observations[$i]['phenomenonId']=str_replace('urn:ogc:def:phenomenon:OGC:1.0.30:','',$observations[$i]['phenomenonId']);
            }
            if($observations[4]['phenomenonId']=='CO'){
                $observations[4]['promedio']=$observations[4]['promedio']*1000;
            }
            for ($i = 0; $i <= 4; $i++){
                $observations[$i]['promedio']=number_format($observations[$i]['promedio'],3);
            }
        }
        return (empty($observations))
            ? $this->error404()
            : new JsonResponse(
                ['observations'=>$observations],
                Response::HTTP_OK);
    }
    /**
     * @Route(path="/maxHour", name="max_hour", methods={ Request::METHOD_GET })
     * @return Response
     */
    public function getCMaxHour():Response{
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT max(observation.timeStamp) as maxHour FROM 
                                                  App\Entity\Observation observation');
        /** * @var Observation[] $observations */
        $observations = $query->getResult();
        return (empty($observations))
            ? $this->error404()
            : new JsonResponse(
                ['observations'=>$observations],
                Response::HTTP_OK);
    }
    /**
     * @Route(path="/{id}", name="options_project", methods={ Request::METHOD_OPTIONS })
     * @param Observation|null $observation
     * @codeCoverageIgnore
     * @return Response
     */
    public function optionsObservation(?Observation $observation = null):Response{
        if (null === $observation) {
            return $this->error404();
        }
        $options="POST,PATCH,GET,PUT,DELETE,OPTIONS";
        return new JsonResponse(null,Response::HTTP_OK ,["Allow" => $options]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/stadistic/moda", name="stadistic_moda", methods={"POST"})
     */
    public function stadisticObservationModa(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT distinct observation.valor as valor, count(observation.valor) as contador 
                                                  FROM 
                                                  App\Entity\Observation observation  
                                                  where observation.timeStamp>= :timeStampInitial 
                                                  and observation.timeStamp<= :timeStampFinal
                                                  and observation.phenomenonId LIKE :Id
                                                  and observation.valor<>0
                                                  group by observation.valor
                                                  order by count(observation.valor)DESC
                                                  ')->setMaxResults(1);
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        $query->setParameter('Id','%'.$data['Id'].'%');

        /** * @var Observation $observations */
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