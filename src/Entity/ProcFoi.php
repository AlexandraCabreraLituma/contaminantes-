<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcFoi
 *
 * @ORM\Table(name="proc_foi")
 * @ORM\Entity
 */
class ProcFoi
{
    /**
     * @var string
     *
     * @ORM\Column(name="procedure_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $procedureId;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_of_interest_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $featureOfInterestId;


}
