<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $short_lib = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'Category')]
    private Collection $products;

    /**
     * @var Collection<int, Prod>
     */
    #[ORM\OneToMany(targetEntity: Prod::class, mappedBy: 'Category')]
    private Collection $lib;

    public function __toString() {
        return $this->libelle;
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->lib = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getShortLib(): ?string
    {
        return $this->short_lib;
    }

    public function setShortLib(string $short_lib): static
    {
        $this->short_lib = $short_lib;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prod>
     */
    public function getLib(): Collection
    {
        return $this->lib;
    }

    public function addLib(Prod $lib): static
    {
        if (!$this->lib->contains($lib)) {
            $this->lib->add($lib);
            $lib->setCategory($this);
        }

        return $this;
    }

    public function removeLib(Prod $lib): static
    {
        if ($this->lib->removeElement($lib)) {
            // set the owning side to null (unless already changed)
            if ($lib->getCategory() === $this) {
                $lib->setCategory(null);
            }
        }

        return $this;
    }
}