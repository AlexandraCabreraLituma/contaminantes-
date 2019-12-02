<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 24/10/2019
 * Time: 9:56
 */

namespace App\Controller;
use App\Entity\PhenOff;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
    const WEIGHTPOLAR = '/weightPolar';
    const SENSOR = '/sensor';

    /**
     * @param $phenomenonId
     * @Route(path="/weightPolar/{phenomenonId}", name="get_weight_polar", methods={ Request::METHOD_GET })
     * @return Response
     *
     */
    public function getCWeightPolar($phenomenonId):Response{
        $em = $this->getDoctrine()->getManager();
       $query = $em->createQuery('SELECT phenOff.phenomenonId,phenOff.pesoMolecular  
                                    FROM App\Entity\PhenOff phenOff 
                                    where phenOff.phenomenonId LIKE :Id');
        $query->setParameter('Id','%'.$phenomenonId.'%');
        /** * @var PhenOff[] $phenoff */
        $phenoff = $query->getResult();
        return (empty($phenoff))
            ? $this->error404()
            : new JsonResponse(
                ['phenoff'=>$phenoff],
                Response::HTTP_OK);
    }

    /**
     * @param $phenomenonId
     * @Route(path="/{phenomenonId}", name="get_phen_off", methods={ Request::METHOD_GET })
     * @return Response
     */
    public function getCPhenOff($phenomenonId):Response{
        $em = $this->getDoctrine()->getManager();
        $phenomenonId='urn:ogc:def:phenomenon:OGC:1.0.30:'.$phenomenonId;
        /** * @var PhenOff $phenoff*/
        $phenoff = $em->getRepository(PhenOff::class)->findOneBy(['phenomenonId' =>$phenomenonId]);
       if (null!==$phenoff){
             $phenoff->setPhenomenonId(str_replace('urn:ogc:def:phenomenon:OGC:1.0.30:','', $phenoff->getPhenomenonId()));
       }
        return (null=== $phenoff)
            ? $this->error404()
            : new JsonResponse(['phenoff'=> $phenoff],
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