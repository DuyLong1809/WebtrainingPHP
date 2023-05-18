<?php

namespace App\Models;

class ProductDomain
{
    private $id;
    private string $name;
    private string $image;
    private int $price;
    private string $mota;
    private  $id_cate;
    private  $id_manufact;

    public function __construct(
        $id,
        $name,
        $price,
        $image,
        $mota,
        $id_cate,
        $id_manufact,
    )
    {
        $this->id = $id;
        $this->id_cate = $id_cate;
        $this->id_manufact = $id_manufact;
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
    public function getIdCate()
    {
        return $this->id_cate;
    }

    /**
     * @param mixed $id_cate
     */
    public function setIdCate($id_cate): void
    {
        $this->id_cate = $id_cate;
    }

    /**
     * @return mixed
     */
    public function getIdManufact()
    {
        return $this->id_manufact;
    }

    /**
     * @param mixed $id_manufact
     */
    public function setIdManufact($id_manufact): void
    {
        $this->id_manufact = $id_manufact;
    }


}
