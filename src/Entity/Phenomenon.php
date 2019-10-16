<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phenomenon
 *
 * @ORM\Table(name="phenomenon")
 * @ORM\Entity
 */
class Phenomenon
{
    /**
     * @var string
     *
     * @ORM\Column(name="phenomenon_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="phenomenon_phenomenon_id_seq", allocationSize=1, initialValue=1)
     */
    private $phenomenonId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phenomenon_description", type="string", length=200, nullable=true)
     */
    private $phenomenonDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=30, nullable=false)
     */
    private $unit;

    /**
     * @var string
     *
     * @ORM\Column(name="valuetype", type="string", length=40, nullable=false)
     */
    private $valuetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="composite_phenomenon_id", type="string", length=100, nullable=true)
     */
    private $compositePhenomenonId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="om_application_schema_link", type="text", nullable=true)
     */
    private $omApplicationSchemaLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factor_correccion", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $factorCorreccion;


}
