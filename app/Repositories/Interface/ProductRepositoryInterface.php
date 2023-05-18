<?php

namespace App\Repositories\Interface;

use App\Models\ProductDomain;

interface ProductRepositoryInterface
{
    public function all();

    public function convertall(): ?array;
    public function findById($id):? ProductDomain;

    public function findCateById($id);

    public function findManuById($id);
    public function create(array $data):? ProductDomain;

    public function update($id, array $data):? ProductDomain;

    public function delete($id);

    public function search($name);

    public function getCategoryById($id_cate);

    public function getManufactureById($id_manu);
}
