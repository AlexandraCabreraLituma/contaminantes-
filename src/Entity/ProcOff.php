<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcOff
 *
 * @ORM\Table(name="proc_off")
 * @ORM\Entity
 */
class ProcOff
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
     * @ORM\Column(name="offering_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $offeringId;


}
