<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * PhenOff
 *
 * @ORM\Table(name="phen_off")
 * @ORM\Entity
 */
class PhenOff implements \JsonSerializable
{
    /**
     * @return string
     */
    public function getPhenomenonId(): string
    {
        return $this->phenomenonId;
    }

    /**
     * @param string $phenomenonId
     */
    public function setPhenomenonId(string $phenomenonId): void
    {
        $this->phenomenonId = $phenomenonId;
    }

    /**
     * @return string
     */
    public function getOfferingId(): string
    {
        return $this->offeringId;
    }

    /**
     * @param string $offeringId
     */
    public function setOfferingId(string $offeringId): void
    {
        $this->offeringId = $offeringId;
    }

    /**
     * @return int|null
     */
    public function getIdContaminanteEmov(): ?int
    {
        return $this->idContaminanteEmov;
    }

    /**
     * @param int|null $idContaminanteEmov
     */
    public function setIdContaminanteEmov(?int $idContaminanteEmov): void
    {
        $this->idContaminanteEmov = $idContaminanteEmov;
    }

    /**
     * @return string|null
     */
    public function getUnidad(): ?string
    {
        return $this->unidad;
    }

    /**
     * @param string|null $unidad
     */
    public function setUnidad(?string $unidad): void
    {
        $this->unidad = $unidad;
    }

    /**
     * @return string|null
     */
    public function getPesoMolecular(): ?string
    {
        return $this->pesoMolecular;
    }

    /**
     * @param string|null $pesoMolecular
     */
    public function setPesoMolecular(?string $pesoMolecular): void
    {
        $this->pesoMolecular = $pesoMolecular;
    }

    /**
     * @return bool|null
     */
    public function getConversion(): ?bool
    {
        return $this->conversion;
    }

    /**
     * @param bool|null $conversion
     */
    public function setConversion(?bool $conversion): void
    {
        $this->conversion = $conversion;
    }

    /**
     * @return string|null
     */
    public function getSensor(): ?string
    {
        return $this->sensor;
    }

    /**
     * @param string|null $sensor
     */
    public function setSensor(?string $sensor): void
    {
        $this->sensor = $sensor;
    }

    /**
     * @return string|null
     */
    public function getAlertaTulsma(): ?string
    {
        return $this->alertaTulsma;
    }

    /**
     * @param string|null $alertaTulsma
     */
    public function setAlertaTulsma(?string $alertaTulsma): void
    {
        $this->alertaTulsma = $alertaTulsma;
    }

    /**
     * @return string|null
     */
    public function getAlarmaTulsma(): ?string
    {
        return $this->alarmaTulsma;
    }

    /**
     * @param string|null $alarmaTulsma
     */
    public function setAlarmaTulsma(?string $alarmaTulsma): void
    {
        $this->alarmaTulsma = $alarmaTulsma;
    }

    /**
     * @return string|null
     */
    public function getEmergenciaTulsma(): ?string
    {
        return $this->emergenciaTulsma;
    }

    /**
     * @param string|null $emergenciaTulsma
     */
    public function setEmergenciaTulsma(?string $emergenciaTulsma): void
    {
        $this->emergenciaTulsma = $emergenciaTulsma;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="phenomenon_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $phenomenonId;

    /**
     * @var string
     *
     * @ORM\Column(name="offering_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $offeringId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_contaminante_emov", type="integer", nullable=true)
     */
    private $idContaminanteEmov;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unidad", type="string", length=10, nullable=true)
     */
    private $unidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="peso_molecular", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $pesoMolecular;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="conversion", type="boolean", nullable=true, options={"default"="1"})
     */
    private $conversion = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sensor", type="string", length=100, nullable=true)
     */
    private $sensor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alerta_tulsma", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $alertaTulsma;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alarma_tulsma", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $alarmaTulsma;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emergencia_tulsma", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $emergenciaTulsma;

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
            'phenomenonId'      => $this->phenomenonId,
            'unidad'            => $this->unidad,
            'sensor'            => $this->sensor,
            'peso_molar'        => $this->pesoMolecular,
            'alertaTulsma'      =>$this->alertaTulsma,
            'alarmaTulsma'      =>$this->alarmaTulsma,
            'emergenciaTulsa'   =>$this->emergenciaTulsma
        );

    }

}
