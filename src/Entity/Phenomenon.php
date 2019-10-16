<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phenomenon
 *
 * @ORM\Table(name="phenomenon", indexes={@ORM\Index(name="IDX_2F24836A8B1C1373", columns={"composite_phenomenon_id"})})
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
     * @ORM\Column(name="om_application_schema_link", type="text", nullable=true)
     */
    private $omApplicationSchemaLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factor_correccion", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $factorCorreccion;

    /**
     * @var \CompositePhenomenon
     *
     * @ORM\ManyToOne(targetEntity="CompositePhenomenon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="composite_phenomenon_id", referencedColumnName="composite_phenomenon_id")
     * })
     */
    private $compositePhenomenon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Procedure", mappedBy="phenomenon")
     */
    private $procedure;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offering", inversedBy="phenomenon")
     * @ORM\JoinTable(name="phen_off",
     *   joinColumns={
     *     @ORM\JoinColumn(name="phenomenon_id", referencedColumnName="phenomenon_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="offering_id", referencedColumnName="offering_id")
     *   }
     * )
     */
    private $offering;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->procedure = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offering = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
