<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FoiOff
 *
 * @ORM\Table(name="foi_off")
 * @ORM\Entity
 */
class FoiOff
{
    /**
     * @var string
     *
     * @ORM\Column(name="feature_of_interest_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $featureOfInterestId;

    /**
     * @var string
     *
     * @ORM\Column(name="offering_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $offeringId;


}
