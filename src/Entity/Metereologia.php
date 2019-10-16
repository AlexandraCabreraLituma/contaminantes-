<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metereologia
 *
 * @ORM\Table(name="metereologia")
 * @ORM\Entity
 */
class Metereologia
{
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


}
