<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table(name="request", indexes={@ORM\Index(name="IDX_3B978F9F8EDF74F0", columns={"offering_id"})})
 * @ORM\Entity
 */
class Request
{
    /**
     * @var int
     *
     * @ORM\Column(name="request_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="request_request_id_seq", allocationSize=1, initialValue=1)
     */
    private $requestId;

    /**
     * @var string
     *
     * @ORM\Column(name="request", type="text", nullable=false)
     */
    private $request;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="begin_lease", type="datetimetz", nullable=true)
     */
    private $beginLease;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_lease", type="datetimetz", nullable=false)
     */
    private $endLease;

    /**
     * @var \Offering
     *
     * @ORM\ManyToOne(targetEntity="Offering")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="offering_id", referencedColumnName="offering_id")
     * })
     */
    private $offering;


}
