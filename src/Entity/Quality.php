<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quality
 *
 * @ORM\Table(name="quality")
 * @ORM\Entity
 */
class Quality
{
    /**
     * @var int
     *
     * @ORM\Column(name="quality_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="quality_quality_id_seq", allocationSize=1, initialValue=1)
     */
    private $qualityId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="quality_name", type="string", length=100, nullable=true)
     */
    private $qualityName;

    /**
     * @var string
     *
     * @ORM\Column(name="quality_unit", type="string", length=100, nullable=false)
     */
    private $qualityUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="quality_value", type="text", nullable=false)
     */
    private $qualityValue;

    /**
     * @var string
     *
     * @ORM\Column(name="quality_type", type="string", length=100, nullable=false)
     */
    private $qualityType;

    /**
     * @var int
     *
     * @ORM\Column(name="observation_id", type="integer", nullable=false)
     */
    private $observationId;


}
