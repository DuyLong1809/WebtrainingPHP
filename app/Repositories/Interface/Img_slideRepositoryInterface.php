<?php

namespace App\Repositories\Interface;

interface Img_slideRepositoryInterface
{
    public function all();

    public function findById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
