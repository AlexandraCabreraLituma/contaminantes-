<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procedure
 *
 * @ORM\Table(name="procedure")
 * @ORM\Entity
 */
class Procedure
{
    /**
     * @var string
     *
     * @ORM\Column(name="procedure_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="procedure_procedure_id_seq", allocationSize=1, initialValue=1)
     */
    private $procedureId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description_url", type="string", length=200, nullable=true)
     */
    private $descriptionUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description_type", type="string", length=100, nullable=true)
     */
    private $descriptionType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sml_file", type="text", nullable=true)
     */
    private $smlFile;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="FeatureOfInterest", inversedBy="procedure")
     * @ORM\JoinTable(name="proc_foi",
     *   joinColumns={
     *     @ORM\JoinColumn(name="procedure_id", referencedColumnName="procedure_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="feature_of_interest_id", referencedColumnName="feature_of_interest_id")
     *   }
     * )
     */
    private $featureOfInterest;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offering", inversedBy="procedure")
     * @ORM\JoinTable(name="proc_off",
     *   joinColumns={
     *     @ORM\JoinColumn(name="procedure_id", referencedColumnName="procedure_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="offering_id", referencedColumnName="offering_id")
     *   }
     * )
     */
    private $offering;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Phenomenon", inversedBy="procedure")
     * @ORM\JoinTable(name="proc_phen",
     *   joinColumns={
     *     @ORM\JoinColumn(name="procedure_id", referencedColumnName="procedure_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="phenomenon_id", referencedColumnName="phenomenon_id")
     *   }
     * )
     */
    private $phenomenon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Procedure", mappedBy="childProcedure")
     */
    private $parentProcedure;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->featureOfInterest = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offering = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phenomenon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parentProcedure = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
