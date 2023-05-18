<?php

namespace App\Repositories\MongoDB;

use App\Models\Category;
use App\Models\Category_collection;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\BaseRepository;

class CategoryCollectionRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category_collection $categoryModel)
    {
        $this->model = $categoryModel;
    }
}
