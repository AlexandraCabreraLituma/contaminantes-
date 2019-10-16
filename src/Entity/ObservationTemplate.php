<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObservationTemplate
 *
 * @ORM\Table(name="observation_template")
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
     * @var string
     *
     * @ORM\Column(name="procedure_id", type="string", length=100, nullable=false)
     */
    private $procedureId;

    /**
     * @var int
     *
     * @ORM\Column(name="request_id", type="integer", nullable=false)
     */
    private $requestId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observation_template", type="text", nullable=true)
     */
    private $observationTemplate;


}
