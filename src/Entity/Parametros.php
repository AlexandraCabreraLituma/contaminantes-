<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametros
 *
 * @ORM\Table(name="parametros")
 * @ORM\Entity
 */
class Parametros
{
    /**
     * @var string
     *
     * @ORM\Column(name="contaminante", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $contaminante;

    /**
     * @var string
     *
     * @ORM\Column(name="rango", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $rango;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bphi", type="decimal", precision=10, scale=0, nullable=true, options={"comment"="punto de ruptura alto"})
     */
    private $bphi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bplo", type="decimal", precision=10, scale=0, nullable=true, options={"comment"="punto de ruptura bajo"})
     */
    private $bplo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ihi", type="decimal", precision=10, scale=0, nullable=true, options={"comment"="Valor del índice alto"})
     */
    private $ihi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ilo", type="decimal", precision=10, scale=0, nullable=true, options={"comment"="valor del índice bajo"})
     */
    private $ilo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=20, nullable=true)
     */
    private $color;


}
