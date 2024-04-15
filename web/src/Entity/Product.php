<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A Product
 */
#[ORM\Entity]
#[ApiResource]
class Product
{
    /**
     * The id of the product.
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    /**
     * The MPN (manufacturer part number) of the product
     */
    #[ORM\Column]
    #[Assert\NotNull]
    private ?string $mpn = null;

    /**
     * The name of the product.
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    private string $name = '';

    /**
     * The description of the product.
     */
    #[ORM\Column(type: "text")]
    #[Assert\NotBlank]
    private string $description = '';

    /**
     * The date of issue of the product.
     */
    #[ORM\Column(type: "datetime")]
    #[Assert\NotNull]
    private ?\DateTimeInterface $issueDate = null;

    /**
     * The manufacturer of the product.
     */
    #[ORM\ManyToOne(
        targetEntity: "Manufacturer",
        inversedBy: "products"
    )]
    private ?Manufacturer $manufacturer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMpn(): ?string
    {
        return $this->mpn;
    }

    public function setMpn(?string $mpn): void
    {
        $this->mpn = $mpn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(?\DateTimeInterface $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    public function getManufacturer(): ?Manufacturer
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?Manufacturer $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }
}