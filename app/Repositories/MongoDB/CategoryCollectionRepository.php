<?php

namespace App\Repositories\MongoDB;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\BaseRepository;

class CategoryCollectionRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $categoryModel)
    {
        $this->model = $categoryModel;
    }
}
