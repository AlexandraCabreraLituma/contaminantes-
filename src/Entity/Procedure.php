<?php

namespace App\Entity;

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


}
