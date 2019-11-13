<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Observation
 *
 * @ORM\Table(name="observation", uniqueConstraints={@ORM\UniqueConstraint(name="observation_time_stamp_procedure_id_feature_of_interest_id__key", columns={"time_stamp", "procedure_id", "feature_of_interest_id", "phenomenon_id"})}, indexes={@ORM\Index(name="foiobstable", columns={"feature_of_interest_id"}), @ORM\Index(name="numericvalueobstable", columns={"numeric_value"})})
 * @ORM\Entity
 */
class Observation implements \JsonSerializable
{
    /**
     * @param \DateTime $timeStamp
     */
    public function setTimeStamp(\DateTime $timeStamp): void
    {
        $this->timeStamp = $timeStamp;
    }

    /**
     * @param string $phenomenonId
     */
    public function setPhenomenonId(string $phenomenonId): void
    {
        $this->phenomenonId = $phenomenonId;
    }

    /**
     * @param string|null $valor
     */
    public function setValor(?string $valor): void
    {
        $this->valor = $valor;
    }
    /**
     * @return \DateTime
     */
    public function getTimeStamp(): \DateTime
    {
        return $this->timeStamp;
    }

    /**
     * @return string
     */
    public function getPhenomenonId(): string
    {
        return $this->phenomenonId;
    }

    /**
     * @return string|null
     */
    public function getValor(): ?string
    {
        return $this->valor;
    }
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
     * @var string
     *
     * @ORM\Column(name="procedure_id", type="string", length=100, nullable=false)
     */
    private $procedureId;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_of_interest_id", type="string", length=100, nullable=false)
     */
    private $featureOfInterestId;

    /**
     * @var string
     *
     * @ORM\Column(name="phenomenon_id", type="string", length=100, nullable=false)
     */
    private $phenomenonId;

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
     * Specify data which should be serialized to JSON
     *
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since  5.4.0
     */
    public function jsonSerialize():array
    {

        return array(
            'time_stamp'        => $this->timeStamp,
            'phenomenonId'      => $this->phenomenonId,
            'valor'             => $this->valor
        );

    }





}
