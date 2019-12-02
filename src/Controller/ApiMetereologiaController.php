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
    //ruta de la api de metereologies
    const METEREOLOGIA_API_PATH='/api/v1/metereologies';
    const SEARCH='/search';
    const TEMPERATURE='/temperature';
    const PRESSURE='/pressure';
    const WIND='/wind';
    const DIRECTION='/direction';

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/temperature", name="search_temperature", methods={"POST"})
     */
    public function searchTemperatureMetereology(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT min(metereologia.tempaireMin) as minimo, avg(metereologia.tempaireAv) as promedio, max(metereologia.tempaireMax) as maximo 
                                    FROM App\Entity\Metereologia metereologia
                                    where metereologia.fechor>= :timeStampInitial 
                                    and metereologia.fechor<= :timeStampFinal ');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        /** * @var Metereologia[] $metereologies */
        $metereologies = $query->getResult();

      if(!empty($metereologies)){
            $metereologies[0]['promedio']=number_format($metereologies[0]['promedio'],3);
        }
        return (empty($metereologies[0]['minimo']))
            ? $this->error404()
            : new JsonResponse(
                ['metereologies'=>$metereologies],
                Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/pressure", name="search_pressure", methods={"POST"})
     */
    public function searchBarometricPressureMetereology(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT min(metereologia.patmMin) as minimo, avg(metereologia.patmAv) as promedio, max(metereologia.patmMax) as maximo 
                                    FROM App\Entity\Metereologia metereologia
                                    where metereologia.fechor>= :timeStampInitial 
                                    and metereologia.fechor<= :timeStampFinal 
                                    ');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        /** * @var Metereologia[] $metereologies */
        $metereologies = $query->getResult();
        if(!empty($metereologies)){
            $metereologies[0]['promedio']=number_format($metereologies[0]['promedio'],3);
        }
        return (empty($metereologies[0]['minimo']))
            ? $this->error404()
            : new JsonResponse(
                ['metereologies'=>$metereologies],
                Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search", name="search_meteorology", methods={"POST"})
     */
    public function searchMetereology(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT min(metereologia.tempaireMin) as tempaireMin, avg(metereologia.tempaireAv) as tempaireAv, max(metereologia.tempaireMax) as tempaireMax,
                                          min(metereologia.patmMin) as patmMin, avg(metereologia.patmAv) as patmAv, max(metereologia.patmMax) as patmMax,
                                          min(metereologia.hrMin) as hrMin, avg(metereologia.hrAv) as hrAv, max(metereologia.hrMax) as hrMax,
                                          min(metereologia.radglobalMin) as radglobalMin, avg(metereologia.radglobalAv) as radglobalAv, max(metereologia.radglobalMax) as radglobalMax,   
                                          min(metereologia.windSpeedMin) as windSpeedMin, avg(metereologia.windspeedAv) as windspeedAv, max(metereologia.windspeedMax) as windspeedMax,
                                          sum(metereologia.precipSum) as precipSum
                                          FROM App\Entity\Metereologia metereologia
                                    where metereologia.fechor>= :timeStampInitial 
                                    and metereologia.fechor<= :timeStampFinal');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        /** * @var Metereologia[] $metereologies */
        $metereologies = $query->getResult();
        if(!empty($metereologies)){
            $metereologies[0]['tempaireAv']=number_format($metereologies[0]['tempaireAv'],3);
            $metereologies[0]['patmAv']=number_format($metereologies[0]['patmAv'],3);
            $metereologies[0]['hrAv']=number_format($metereologies[0]['hrAv'],3);
            $metereologies[0]['radglobalAv']=number_format($metereologies[0]['radglobalAv'],3);
            $metereologies[0]['windspeedAv']=number_format($metereologies[0]['windspeedAv'],3);

        }
        return (empty($metereologies[0]['tempaireMin']))
            ? $this->error404()
            : new JsonResponse(
                ['metereologies'=>$metereologies],
                Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/search/wind/direction", name="search_wind_direction", methods={"POST"})
     */
    public function searchWindDirectionMetereology(Request $request): Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);
        $query = $em->createQuery('SELECT sum(metereologia.winddirAv) as suma, count(metereologia.winddirAv) as contador
                                    FROM App\Entity\Metereologia metereologia
                                    where metereologia.fechor>= :timeStampInitial 
                                    and metereologia.fechor<= :timeStampFinal 
                                    ');
        $query->setParameter('timeStampInitial',$data['initial_time_stamp']);
        $query->setParameter('timeStampFinal',$data['final_time_stamp']);
        /** * @var Metereologia[] $metereologies */
        $metereologies = $query->getResult();
        $datos=[];
        if(!is_null($metereologies[0]['suma'])){
            $media=(float)($metereologies[0]['suma']/$metereologies[0]['contador']);
            $media=number_format($media,0);
            $datos = ['mediana'=>$media];
        }
        return (empty($datos))
            ? $this->error404()
            : new JsonResponse(
                ['metereologies'=>$datos],
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