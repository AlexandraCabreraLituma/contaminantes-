<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompositePhenomenon
 *
 * @ORM\Table(name="composite_phenomenon")
 * @ORM\Entity
 */
class CompositePhenomenon
{
    /**
     * @var string
     *
     * @ORM\Column(name="composite_phenomenon_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="composite_phenomenon_composite_phenomenon_id_seq", allocationSize=1, initialValue=1)
     */
    private $compositePhenomenonId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="composite_phenomenon_description", type="string", length=100, nullable=true)
     */
    private $compositePhenomenonDescription;


}
