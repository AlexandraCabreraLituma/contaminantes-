<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestCompositePhenomenon
 *
 * @ORM\Table(name="request_composite_phenomenon")
 * @ORM\Entity
 */
class RequestCompositePhenomenon
{
    /**
     * @var int
     *
     * @ORM\Column(name="re_com_phe_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="request_composite_phenomenon_re_com_phe_id_seq", allocationSize=1, initialValue=1)
     */
    private $reComPheId;

    /**
     * @var string
     *
     * @ORM\Column(name="composite_phenomenon_id", type="string", length=100, nullable=false)
     */
    private $compositePhenomenonId;

    /**
     * @var int
     *
     * @ORM\Column(name="request_id", type="integer", nullable=false)
     */
    private $requestId;


}
