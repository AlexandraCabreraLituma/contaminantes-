<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhenOff
 *
 * @ORM\Table(name="phen_off")
 * @ORM\Entity
 */
class PhenOff
{
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


}
