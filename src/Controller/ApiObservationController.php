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
     * @return JsonResponse
     ** @codeCoverageIgnore
     */
    private function error422() : JsonResponse
    {
        $mensaje=[
            'code'=> Response::HTTP_UNPROCESSABLE_ENTITY,
            'mensaje' => 'Unprocessable entity is left out'
        ];
        return new JsonResponse(
            $mensaje,
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }


    /**
     * @return JsonResponse
     ** @codeCoverageIgnore
     */
    private function error400() : JsonResponse
    {
        $mensaje=[
            'code'=> Response::HTTP_BAD_REQUEST,
            'mensaje' => 'Bad Request User do not exists'
        ];
        return new JsonResponse(
            $mensaje,
            Response::HTTP_BAD_REQUEST
        );
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