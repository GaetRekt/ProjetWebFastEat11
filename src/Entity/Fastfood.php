<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FastfoodRepository")
 */
class Fastfood
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
   * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="fastfood")
   */
  private $products;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="fastfood")
   */
  private $orders;

  /**
   * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="fastfood", cascade={"persist", "remove"})
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $phone;

  /**
   * @ORM\Column(type="text")
   */
  private $address;

  /**
   * @ORM\Column(type="text")
   */
  private $city;

  /**
   * @ORM\Column(type="text")
   */
  private $zip;

  /**
   * @ORM\Column(type="text")
   */
  private $content;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $image;

  public function __toString()
    {
        return $this->name;
    }

  public function __construct()
  {
    $this->products = new ArrayCollection();
    $this->orders = new ArrayCollection();
  }

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

/**
   * @return Collection|Product[]
   */
  public function getProducts(): Collection
  {
      return $this->products;
  }

  public function addProduct(Product $product): self
  {
      if (!$this->products->contains($product)) {
          $this->products[] = $product;
          $product->setFastfood($this);
      }

      return $this;
  }

  public function removeProduct(Product $product): self
  {
      if ($this->products->contains($product)) {
          $this->products->removeElement($product);
          if ($product->getFastfood() === $this) {
              $product->setFastfood(null);
          }
      }

      return $this;
  }

  /**
   * @return Collection|Order[]
   */
  public function getOrders(): Collection
  {
      return $this->orders;
  }

  public function addOrder(Order $order): self
  {
      if (!$this->orders->contains($order)) {
          $this->orders[] = $order;
          $order->setFastfood($this);
      }

      return $this;
  }

  public function removeOrder(Order $order): self
  {
    if ($this->orders->contains($order)) {
      $this->orders->removeElement($order);
      if ($order->getFastfood() === $this) {
          $order->setFastfood(null);
        }
    }

    return $this;
  }

  public function getUser(): ?User
  {
    return $this->user;
  }

  public function setUser(User $user): self
  {
    $this->user = $user;

    return $this;
  }

  public function getPhone(): ?string
  {
    return $this->phone;
  }

  public function setPhone(?string $phone): self
  {
    $this->phone = $phone;

    return $this;
  }

  public function getAddress(): ?string
  {
    return $this->address;
  }

  public function setAddress(string $address): self
  {
    $this->address = $address;

    return $this;
  }

  public function getCity(): ?string
  {
    return $this->city;
  }

  public function setCity(string $city): self
  {
    $this->city = $city;

    return $this;
  }

  public function getZip(): ?string
  {
    return $this->zip;
  }

  public function setZip(string $zip): self
  {
    $this->zip = $zip;

    return $this;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content): self
  {
    $this->content = $content;

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
