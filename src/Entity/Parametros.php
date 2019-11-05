<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Parametros
 *
 * @ORM\Table(name="parametros")
 * @ORM\Entity
 */
class Parametros implements \JsonSerializable
{
    /**
     * @return string
     */
    public function getContaminante(): string
    {
        return $this->contaminante;
    }

    /**
     * @param string $contaminante
     */
    public function setContaminante(string $contaminante): void
    {
        $this->contaminante = $contaminante;
    }

    /**
     * @return string
     */
    public function getRango(): string
    {
        return $this->rango;
    }

    /**
     * @param string $rango
     */
    public function setRango(string $rango): void
    {
        $this->rango = $rango;
    }

    /**
     * @return string|null
     */
    public function getBphi(): ?string
    {
        return $this->bphi;
    }

    /**
     * @param string|null $bphi
     */
    public function setBphi(?string $bphi): void
    {
        $this->bphi = $bphi;
    }

    /**
     * @return string|null
     */
    public function getBplo(): ?string
    {
        return $this->bplo;
    }

    /**
     * @param string|null $bplo
     */
    public function setBplo(?string $bplo): void
    {
        $this->bplo = $bplo;
    }

    /**
     * @return string|null
     */
    public function getIhi(): ?string
    {
        return $this->ihi;
    }

    /**
     * @param string|null $ihi
     */
    public function setIhi(?string $ihi): void
    {
        $this->ihi = $ihi;
    }

    /**
     * @return string|null
     */
    public function getIlo(): ?string
    {
        return $this->ilo;
    }

    /**
     * @param string|null $ilo
     */
    public function setIlo(?string $ilo): void
    {
        $this->ilo = $ilo;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }
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


    /**
     * Specify data which should be serialized to JSON
     *
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since  5.4.0
     */
    public function jsonSerialize():array
    {

        return array(
            'contaminante'        => $this->contaminante,
            'rango'               => $this->rango,
            'bphi'                => $this->bphi,
            'bplo'                => $this->bplo,
            'ihi'                 => $this->ihi,
            'ilo'                 => $this->ilo,
            'color'               => $this->color



        );

    }


}
