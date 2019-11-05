<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 5/11/2019
 * Time: 17:55
 */

namespace App\Controller;

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
 * @Route(path=ApiObservationController::PARAMETROS_API_PATH, name="api_parametros_")
 *
 */
class ApiParametrosController  extends AbstractController
{
    //ruta de la api de observation
    const OBSERVATION_API_PATH='/api/v1/observations';
    const SEARCH='/search';
    const CONTAMINANTE='/contaminante';

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/contaminante", name="search", methods={"POST"})
     */
    public function getCParametrosByContaminanteValor(Request $request):Response{
        $em = $this->getDoctrine()->getManager();
        $dataRequest = $request->getContent();
        $data = json_decode($dataRequest, true);

        $query = $em->createQuery('SELECT observation.timeStamp,observation.phenomenonId, 
                                    observation.valor FROM App\Entity\Observation observation 
                                    where observation.timeStamp>= :timeStampInitial 
                                    and observation.timeStamp<= :timeStampFinal 
                                    ');
        $query->setParameter('contaminante',$data['contaminante']);
        $query->setParameter('valor',$data['valor']);

        /** * @var Observation[] $observations */
        $observations = $query->getResult();

        return (empty($observations))
            ? $this->error404()
            : new JsonResponse(
                ['observations'=>$observations],
                Response::HTTP_OK);
    }

}