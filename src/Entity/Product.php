<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
  public const PAGE_NB_ITEMS = 10;
  
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $name;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Fastfood", inversedBy="products")
   * @ORM\JoinColumn(nullable=false)
   */
  private $fastfood;
  
  /**
   * @ORM\Column(type="text")
   */
  private $description;

  /**
   * @ORM\Column(type="boolean")
   */
  private $display;

  /**
   * @ORM\Column(type="float")
   */
  private $priceHT;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $image;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function getFastfood(): ?Fastfood
  {
      return $this->fastfood;
  }

  public function setFastfood(?Fastfood $fastfood): self
  {
      $this->fastfood = $fastfood;

      return $this;
  }

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(string $description): self
  {
    $this->description = $description;

    return $this;
  }

  public function getDisplay(): ?bool
  {
    return $this->display;
  }

  public function setDisplay(bool $display): self
  {
    $this->display = $display;

    return $this;
  }

  public function getPriceHT(): ?float
  {
    return $this->priceHT;
  }

  public function setPriceHT(float $priceHT): self
  {
    $this->priceHT = $priceHT;

    return $this;
  }

  public function getImage(): ?string
  {
      return $this->image;
  }

  public function setImage(?string $image): self
  {
      $this->image = $image;

      return $this;
  }
}
