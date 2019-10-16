<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObservationTemplate
 *
 * @ORM\Table(name="observation_template", indexes={@ORM\Index(name="IDX_167CDB541624BCD2", columns={"procedure_id"}), @ORM\Index(name="IDX_167CDB54427EB8A5", columns={"request_id"})})
 * @ORM\Entity
 */
class ObservationTemplate
{
    /**
     * @var int
     *
     * @ORM\Column(name="obs_template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="observation_template_obs_template_id_seq", allocationSize=1, initialValue=1)
     */
    private $obsTemplateId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observation_template", type="text", nullable=true)
     */
    private $observationTemplate;

    /**
     * @var \Procedure
     *
     * @ORM\ManyToOne(targetEntity="Procedure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="procedure_id", referencedColumnName="procedure_id")
     * })
     */
    private $procedure;

    /**
     * @var \Request
     *
     * @ORM\ManyToOne(targetEntity="Request")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="request_id", referencedColumnName="request_id")
     * })
     */
    private $request;


}
