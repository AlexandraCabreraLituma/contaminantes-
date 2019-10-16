<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observation
 *
 * @ORM\Table(name="observation", uniqueConstraints={@ORM\UniqueConstraint(name="observation_time_stamp_procedure_id_feature_of_interest_id__key", columns={"time_stamp", "procedure_id", "feature_of_interest_id", "phenomenon_id"})}, indexes={@ORM\Index(name="phenobstable", columns={"phenomenon_id"}), @ORM\Index(name="spatialvalueobstableindex", columns={"spatial_value"}), @ORM\Index(name="numericvalueobstable", columns={"numeric_value"}), @ORM\Index(name="timeindexobstable", columns={"time_stamp", "procedure_id", "feature_of_interest_id", "phenomenon_id"}), @ORM\Index(name="procobstable", columns={"procedure_id"}), @ORM\Index(name="foiobstable", columns={"feature_of_interest_id"}), @ORM\Index(name="textvalueobstable", columns={"text_value"})})
 * @ORM\Entity
 */
class Observation
{
    /**
     * @var int
     *
     * @ORM\Column(name="observation_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="observation_observation_id_seq", allocationSize=1, initialValue=1)
     */
    private $observationId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_stamp", type="datetimetz", nullable=false)
     */
    private $timeStamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_value", type="text", nullable=true)
     */
    private $textValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numeric_value", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $numericValue;

    /**
     * @var geometry|null
     *
     * @ORM\Column(name="spatial_value", type="geometry", nullable=true)
     */
    private $spatialValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mime_type", type="string", length=100, nullable=true)
     */
    private $mimeType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="valor_sin_factor", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $valorSinFactor;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="replica", type="boolean", nullable=true)
     */
    private $replica = false;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_mysql", type="integer", nullable=true)
     */
    private $idMysql;

    /**
     * @var \FeatureOfInterest
     *
     * @ORM\ManyToOne(targetEntity="FeatureOfInterest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="feature_of_interest_id", referencedColumnName="feature_of_interest_id")
     * })
     */
    private $featureOfInterest;

    /**
     * @var \Phenomenon
     *
     * @ORM\ManyToOne(targetEntity="Phenomenon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phenomenon_id", referencedColumnName="phenomenon_id")
     * })
     */
    private $phenomenon;

    /**
     * @var \Procedure
     *
     * @ORM\ManyToOne(targetEntity="Procedure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="procedure_id", referencedColumnName="procedure_id")
     * })
     */
    private $procedure;


}
