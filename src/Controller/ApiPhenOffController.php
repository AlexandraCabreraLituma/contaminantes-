<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 24/10/2019
 * Time: 9:56
 */

namespace App\Controller;
use App\Entity\PhenOff;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiPhenOffController
 * @package App\Controller
 * @Route(path=ApiPhenOffController::PHENOFF_API_PATH, name="api_phenoff_")
 *
 */
class ApiPhenOffController extends AbstractController
{
    //ruta de la api de phenoff
    const PHENOFF_API_PATH='/api/v1/phenoff';

    /**
     * @param $phenomenonId
     * @Route(path="/weightPolar/{phenomenonId}", name="get_weight_polar", methods={ Request::METHOD_GET })
     * @return Response
     *
     */
    public function getCWeightPolar($phenomenonId):Response{
        $em = $this->getDoctrine()->getManager();


        $query = $em->createQuery('SELECT phenOff.pesoMolecular  
                                    FROM App\Entity\PhenOff phenOff 
                                    where phenOff.phenomenonId LIKE :Id');
        $query->setParameter('Id','%'.$phenomenonId.'%');

        /** * @var PhenOff[] $phenoff */
        $phenoff = $query->getResult();

        return (empty($phenoff))
            ? $this->error404()
            : new JsonResponse(
                ['phenoffs'=>$phenoff],
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