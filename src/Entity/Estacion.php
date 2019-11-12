<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Estacion
 *
 * @ORM\Table(name="estacion")
 * @ORM\Entity
 */
class Estacion implements \JsonSerializable
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string|null $nombre
     */
    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string|null
     */
    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    /**
     * @param string|null $ubicacion
     */
    public function setUbicacion(?string $ubicacion): void
    {
        $this->ubicacion = $ubicacion;
    }
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
            'nombre'      => $this->nombre,
            'ubicacion'   => $this->ubicacion

        );

    }

}
