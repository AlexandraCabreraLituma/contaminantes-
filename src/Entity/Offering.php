<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offering
 *
 * @ORM\Table(name="offering")
 * @ORM\Entity
 */
class Offering
{
    /**
     * @var string
     *
     * @ORM\Column(name="offering_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="offering_offering_id_seq", allocationSize=1, initialValue=1)
     */
    private $offeringId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="offering_name", type="string", length=100, nullable=true)
     */
    private $offeringName;

    /**
     * @var bool
     *
     * @ORM\Column(name="all_procs", type="boolean", nullable=false)
     */
    private $allProcs = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="all_phen", type="boolean", nullable=false)
     */
    private $allPhen = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="all_fois", type="boolean", nullable=false)
     */
    private $allFois = false;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Procedure", mappedBy="offering")
     */
    private $procedure;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CompositePhenomenon", mappedBy="offering")
     */
    private $compositePhenomenon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="FeatureOfInterest", mappedBy="offering")
     */
    private $featureOfInterest;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Phenomenon", mappedBy="offering")
     */
    private $phenomenon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->procedure = new \Doctrine\Common\Collections\ArrayCollection();
        $this->compositePhenomenon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->featureOfInterest = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phenomenon = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
