<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estacion
 *
 * @ORM\Table(name="estacion")
 * @ORM\Entity
 */
class Estacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ubicacion", type="string", length=100, nullable=true)
     */
    private $ubicacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lat", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lon", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $lon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="altura", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $altura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="registros_carga", type="decimal", precision=10, scale=0, nullable=true, options={"default"="1000"})
     */
    private $registrosCarga = '1000';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_ultima_carga", type="datetime", nullable=true, options={"default"="2012-09-14 10:30:00"})
     */
    private $fechaUltimaCarga = '2012-09-14 10:30:00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_ultimo_registro_cargado", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $idUltimoRegistroCargado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="met_fecha_ultima_carga", type="datetime", nullable=true)
     */
    private $metFechaUltimaCarga;

    /**
     * @var string|null
     *
     * @ORM\Column(name="met_id_ultimo_registro_cargado", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $metIdUltimoRegistroCargado;


}
