<?php

namespace App\Repositories\Interface;

interface CategoryRepositoryInterface
{
    public function all();
    public function findById($id);
}
