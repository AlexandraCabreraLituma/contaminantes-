<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComPhenOff
 *
 * @ORM\Table(name="com_phen_off")
 * @ORM\Entity
 */
class ComPhenOff
{
    /**
     * @var string
     *
     * @ORM\Column(name="composite_phenomenon_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $compositePhenomenonId;

    /**
     * @var string
     *
     * @ORM\Column(name="offering_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $offeringId;


}
