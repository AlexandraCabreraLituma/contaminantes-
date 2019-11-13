<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcPhen
 *
 * @ORM\Table(name="proc_phen")
 * @ORM\Entity
 */
class ProcPhen
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
     * @ORM\Column(name="phenomenon_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $phenomenonId;


}
