<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestPhenomenon
 *
 * @ORM\Table(name="request_phenomenon")
 * @ORM\Entity
 */
class RequestPhenomenon
{
    /**
     * @var int
     *
     * @ORM\Column(name="request_phenomenon_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="request_phenomenon_request_phenomenon_id_seq", allocationSize=1, initialValue=1)
     */
    private $requestPhenomenonId;

    /**
     * @var string
     *
     * @ORM\Column(name="phenomenon_id", type="string", length=100, nullable=false)
     */
    private $phenomenonId;

    /**
     * @var int
     *
     * @ORM\Column(name="request_id", type="integer", nullable=false)
     */
    private $requestId;


}
