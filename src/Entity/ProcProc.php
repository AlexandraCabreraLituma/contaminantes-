<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcProc
 *
 * @ORM\Table(name="proc_proc")
 * @ORM\Entity
 */
class ProcProc
{
    /**
     * @var string
     *
     * @ORM\Column(name="parent_procedure_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $parentProcedureId;

    /**
     * @var string
     *
     * @ORM\Column(name="child_procedure_id", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $childProcedureId;


}
