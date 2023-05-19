<?php

namespace App\Models;

class ProductDetailDomain
{
    private $id;
    private string $name;
    private string $image;
    private int $price;
    private string $mota;
    private  $name_cate;
    private  $name_manufact;

    public function __construct(
        $id,
        $name,
        $price,
        $image,
        $mota,
        $name_cate,
        $name_manufact,
    )
    {
        $this->id = $id;
        $this->name_cate = $name_cate;
        $this->name_manufact = $name_manufact;
        $this->mota = $mota;
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getMota(): string
    {
        return $this->mota;
    }

    /**
     * @param string $mota
     */
    public function setMota(string $mota): void
    {
        $this->mota = $mota;
    }

    /**
     * @return mixed
     */
    public function getNameCate()
    {
        return $this->name_cate;
    }

    /**
     * @param mixed $name_cate
     */
    public function setNameCate($name_cate): void
    {
        $this->name_cate = $name_cate;
    }

    /**
     * @return mixed
     */
    public function getNameManufact()
    {
        return $this->name_manufact;
    }

    /**
     * @param mixed $name_manufact
     */
    public function setNameManufact($name_manufact): void
    {
        $this->name_manufact = $name_manufact;
    }
}
