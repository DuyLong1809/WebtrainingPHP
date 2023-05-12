<?php

namespace App\Repositories\Interface;

interface ManufacturerRepositoryInterface
{
    public function all();
    public function findById($id);
}
