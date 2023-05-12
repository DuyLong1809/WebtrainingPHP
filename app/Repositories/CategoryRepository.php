<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository implements Interface\CategoryRepositoryInterface
{
    protected Category $categoryModel;
    public function __construct(Category $categoryModel)
    {
        $this->model = $categoryModel;
    }

}
