<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeatureOfInterest
 *
 * @ORM\Table(name="feature_of_interest", indexes={@ORM\Index(name="foigeomindex", columns={"geom"})})
 * @ORM\Entity
 */
class FeatureOfInterest
{
    /**
     * @var string
     *
     * @ORM\Column(name="feature_of_interest_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="feature_of_interest_feature_of_interest_id_seq", allocationSize=1, initialValue=1)
     */
    private $featureOfInterestId;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_of_interest_name", type="string", length=100, nullable=false)
     */
    private $featureOfInterestName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="feature_of_interest_description", type="string", length=200, nullable=true)
     */
    private $featureOfInterestDescription;

    /**
     * @var geometry
     *
     * @ORM\Column(name="geom", type="geometry", nullable=false)
     */
    private $geom;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_type", type="text", nullable=false)
     */
    private $featureType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="schema_link", type="text", nullable=true)
     */
    private $schemaLink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Procedure", mappedBy="featureOfInterest")
     */
    private $procedure;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offering", inversedBy="featureOfInterest")
     * @ORM\JoinTable(name="foi_off",
     *   joinColumns={
     *     @ORM\JoinColumn(name="feature_of_interest_id", referencedColumnName="feature_of_interest_id")
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
