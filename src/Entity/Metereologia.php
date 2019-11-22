<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Metereologia
 *
 * @ORM\Table(name="metereologia")
 * @ORM\Entity
 */
class Metereologia implements \JsonSerializable
{
    /**
     * @return \DateTime
     */
    public function getFechor(): \DateTime
    {
        return $this->fechor;
    }

    /**
     * @param \DateTime $fechor
     */
    public function setFechor(\DateTime $fechor): void
    {
        $this->fechor = $fechor;
    }

    /**
     * @return string|null
     */
    public function getTempaireAv(): ?string
    {
        return $this->tempaireAv;
    }

    /**
     * @param string|null $tempaireAv
     */
    public function setTempaireAv(?string $tempaireAv): void
    {
        $this->tempaireAv = $tempaireAv;
    }

    /**
     * @return string|null
     */
    public function getTempaireMax(): ?string
    {
        return $this->tempaireMax;
    }

    /**
     * @param string|null $tempaireMax
     */
    public function setTempaireMax(?string $tempaireMax): void
    {
        $this->tempaireMax = $tempaireMax;
    }

    /**
     * @return string|null
     */
    public function getTempaireMin(): ?string
    {
        return $this->tempaireMin;
    }

    /**
     * @param string|null $tempaireMin
     */
    public function setTempaireMin(?string $tempaireMin): void
    {
        $this->tempaireMin = $tempaireMin;
    }

    /**
     * @return string|null
     */
    public function getHrAv(): ?string
    {
        return $this->hrAv;
    }

    /**
     * @param string|null $hrAv
     */
    public function setHrAv(?string $hrAv): void
    {
        $this->hrAv = $hrAv;
    }

    /**
     * @return string|null
     */
    public function getHrMax(): ?string
    {
        return $this->hrMax;
    }

    /**
     * @param string|null $hrMax
     */
    public function setHrMax(?string $hrMax): void
    {
        $this->hrMax = $hrMax;
    }

    /**
     * @return string|null
     */
    public function getHrMin(): ?string
    {
        return $this->hrMin;
    }

    /**
     * @param string|null $hrMin
     */
    public function setHrMin(?string $hrMin): void
    {
        $this->hrMin = $hrMin;
    }

    /**
     * @return string|null
     */
    public function getDpAv(): ?string
    {
        return $this->dpAv;
    }

    /**
     * @param string|null $dpAv
     */
    public function setDpAv(?string $dpAv): void
    {
        $this->dpAv = $dpAv;
    }

    /**
     * @return string|null
     */
    public function getDpMax(): ?string
    {
        return $this->dpMax;
    }

    /**
     * @param string|null $dpMax
     */
    public function setDpMax(?string $dpMax): void
    {
        $this->dpMax = $dpMax;
    }

    /**
     * @return string|null
     */
    public function getDpMin(): ?string
    {
        return $this->dpMin;
    }

    /**
     * @param string|null $dpMin
     */
    public function setDpMin(?string $dpMin): void
    {
        $this->dpMin = $dpMin;
    }

    /**
     * @return string|null
     */
    public function getPatmAv(): ?string
    {
        return $this->patmAv;
    }

    /**
     * @param string|null $patmAv
     */
    public function setPatmAv(?string $patmAv): void
    {
        $this->patmAv = $patmAv;
    }

    /**
     * @return string|null
     */
    public function getPatmMax(): ?string
    {
        return $this->patmMax;
    }

    /**
     * @param string|null $patmMax
     */
    public function setPatmMax(?string $patmMax): void
    {
        $this->patmMax = $patmMax;
    }

    /**
     * @return string|null
     */
    public function getPatmMin(): ?string
    {
        return $this->patmMin;
    }

    /**
     * @param string|null $patmMin
     */
    public function setPatmMin(?string $patmMin): void
    {
        $this->patmMin = $patmMin;
    }

    /**
     * @return string|null
     */
    public function getRadglobalAv(): ?string
    {
        return $this->radglobalAv;
    }

    /**
     * @param string|null $radglobalAv
     */
    public function setRadglobalAv(?string $radglobalAv): void
    {
        $this->radglobalAv = $radglobalAv;
    }

    /**
     * @return string|null
     */
    public function getRadglobalMax(): ?string
    {
        return $this->radglobalMax;
    }

    /**
     * @param string|null $radglobalMax
     */
    public function setRadglobalMax(?string $radglobalMax): void
    {
        $this->radglobalMax = $radglobalMax;
    }

    /**
     * @return string|null
     */
    public function getRadglobalMin(): ?string
    {
        return $this->radglobalMin;
    }

    /**
     * @param string|null $radglobalMin
     */
    public function setRadglobalMin(?string $radglobalMin): void
    {
        $this->radglobalMin = $radglobalMin;
    }

    /**
     * @return string|null
     */
    public function getPrecipSum(): ?string
    {
        return $this->precipSum;
    }

    /**
     * @param string|null $precipSum
     */
    public function setPrecipSum(?string $precipSum): void
    {
        $this->precipSum = $precipSum;
    }

    /**
     * @return string|null
     */
    public function getWindspeedAv(): ?string
    {
        return $this->windspeedAv;
    }

    /**
     * @param string|null $windspeedAv
     */
    public function setWindspeedAv(?string $windspeedAv): void
    {
        $this->windspeedAv = $windspeedAv;
    }

    /**
     * @return string|null
     */
    public function getWindspeedMax(): ?string
    {
        return $this->windspeedMax;
    }

    /**
     * @param string|null $windspeedMax
     */
    public function setWindspeedMax(?string $windspeedMax): void
    {
        $this->windspeedMax = $windspeedMax;
    }

    /**
     * @return string|null
     */
    public function getWindSpeedMin(): ?string
    {
        return $this->windSpeedMin;
    }

    /**
     * @param string|null $windSpeedMin
     */
    public function setWindSpeedMin(?string $windSpeedMin): void
    {
        $this->windSpeedMin = $windSpeedMin;
    }

    /**
     * @return string|null
     */
    public function getWinddirAv(): ?string
    {
        return $this->winddirAv;
    }

    /**
     * @param string|null $winddirAv
     */
    public function setWinddirAv(?string $winddirAv): void
    {
        $this->winddirAv = $winddirAv;
    }

    /**
     * @return string|null
     */
    public function getWinddirMax(): ?string
    {
        return $this->winddirMax;
    }

    /**
     * @param string|null $winddirMax
     */
    public function setWinddirMax(?string $winddirMax): void
    {
        $this->winddirMax = $winddirMax;
    }

    /**
     * @return string|null
     */
    public function getWinddirMin(): ?string
    {
        return $this->winddirMin;
    }

    /**
     * @param string|null $winddirMin
     */
    public function setWinddirMin(?string $winddirMin): void
    {
        $this->winddirMin = $winddirMin;
    }

    /**
     * @return string|null
     */
    public function getUvaAv(): ?string
    {
        return $this->uvaAv;
    }

    /**
     * @param string|null $uvaAv
     */
    public function setUvaAv(?string $uvaAv): void
    {
        $this->uvaAv = $uvaAv;
    }

    /**
     * @return string|null
     */
    public function getUvaMax(): ?string
    {
        return $this->uvaMax;
    }

    /**
     * @param string|null $uvaMax
     */
    public function setUvaMax(?string $uvaMax): void
    {
        $this->uvaMax = $uvaMax;
    }

    /**
     * @return string|null
     */
    public function getUvaMin(): ?string
    {
        return $this->uvaMin;
    }

    /**
     * @param string|null $uvaMin
     */
    public function setUvaMin(?string $uvaMin): void
    {
        $this->uvaMin = $uvaMin;
    }

    /**
     * @return string|null
     */
    public function getUveAv(): ?string
    {
        return $this->uveAv;
    }

    /**
     * @param string|null $uveAv
     */
    public function setUveAv(?string $uveAv): void
    {
        $this->uveAv = $uveAv;
    }

    /**
     * @return string|null
     */
    public function getUveMax(): ?string
    {
        return $this->uveMax;
    }

    /**
     * @param string|null $uveMax
     */
    public function setUveMax(?string $uveMax): void
    {
        $this->uveMax = $uveMax;
    }

    /**
     * @return string|null
     */
    public function getUveMin(): ?string
    {
        return $this->uveMin;
    }

    /**
     * @param string|null $uveMin
     */
    public function setUveMin(?string $uveMin): void
    {
        $this->uveMin = $uveMin;
    }

    /**
     * @return string|null
     */
    public function getTuvAv(): ?string
    {
        return $this->tuvAv;
    }

    /**
     * @param string|null $tuvAv
     */
    public function setTuvAv(?string $tuvAv): void
    {
        $this->tuvAv = $tuvAv;
    }

    /**
     * @return string|null
     */
    public function getTuvMax(): ?string
    {
        return $this->tuvMax;
    }

    /**
     * @param string|null $tuvMax
     */
    public function setTuvMax(?string $tuvMax): void
    {
        $this->tuvMax = $tuvMax;
    }

    /**
     * @return string|null
     */
    public function getTuvMin(): ?string
    {
        return $this->tuvMin;
    }

    /**
     * @param string|null $tuvMin
     */
    public function setTuvMin(?string $tuvMin): void
    {
        $this->tuvMin = $tuvMin;
    }

    /**
     * @return int|null
     */
    public function getIdMysql(): ?int
    {
        return $this->idMysql;
    }

    /**
     * @param int|null $idMysql
     */
    public function setIdMysql(?int $idMysql): void
    {
        $this->idMysql = $idMysql;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechor", type="datetime", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="metereologia_fechor_seq", allocationSize=1, initialValue=1)
     */
    private $fechor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempaire_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tempaireAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempaire_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tempaireMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempaire_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tempaireMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hr_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $hrAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hr_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $hrMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hr_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $hrMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dp_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $dpAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dp_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $dpMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dp_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $dpMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patm_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $patmAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patm_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $patmMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patm_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $patmMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="radglobal_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $radglobalAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="radglobal_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $radglobalMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="radglobal_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $radglobalMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precip_sum", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $precipSum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="windspeed_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $windspeedAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="windspeed_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $windspeedMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wind_speed_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $windSpeedMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="winddir_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $winddirAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="winddir_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $winddirMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="winddir_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $winddirMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uva_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $uvaAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uva_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $uvaMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uva_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $uvaMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uve_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $uveAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uve_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $uveMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uve_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $uveMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tuv_av", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tuvAv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tuv_max", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tuvMax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tuv_min", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $tuvMin;

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
            'tempaire_min'      => $this->tempaireMin,
            'tempaire_av'       => $this->tempaireAv,
            'tempaire_max'      => $this->tempaireMax,
            'hr_min'            => $this->hrMin,
            'hr_av'             => $this->hrAv,
            'hr_max'            => $this->hrMax,
            'dp_min'            => $this->dpMin,
            'dp_av'             => $this->dpAv,
            'dp_max'            => $this->dpMax,
            'pat_min'           => $this->patmMin,
            'pat_av'            => $this->patmAv,
            'pat_max'           => $this->patmMax,
            'radglobal_min'     => $this->radglobalMin,
            'radlobal_av'       => $this->radglobalAv,
            'radglobal_max'     => $this->radglobalMax,
            'precip_sum'        => $this->precipSum,
            'windspeed_min'     => $this->windSpeedMin,
            'windspeed_av'      => $this->windspeedAv,
            'windspeed_max'     => $this->windspeedMax,
            'winddir_min'       => $this->winddirMin,
            'winddir_av'        => $this->winddirAv,
            'winddir_max'       => $this->winddirMax,
            'precip_sum'       => $this->precipSum
        );

    }

}
