<?php

namespace App\Repositories\Interface;

interface ProductRepositoryInterface
{
    public function all();

    public function findById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function search($name);

    public function getCategoryById($id_cate);

    public function getManufactureById($id_manu);
}
