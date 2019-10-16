<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpRecibidos
 *
 * @ORM\Table(name="tmp_recibidos")
 * @ORM\Entity
 */
class TmpRecibidos
{
    /**
     * @var int
     *
     * @ORM\Column(name="serie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tmp_recibidos_serie_seq", allocationSize=1, initialValue=1)
     */
    private $serie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="registro", type="text", nullable=true)
     */
    private $registro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archivo_origen", type="text", nullable=true)
     */
    private $archivoOrigen;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="insertado", type="datetime", nullable=true, options={"default"="now()"})
     */
    private $insertado = 'now()';


}
