<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements Interface\CategoryRepositoryInterface
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getIdCate($id)
    {
        return $this->categoryModel->findOrFail($id);
    }

    public function getAllCategory()
    {
        return $this->categoryModel->all();
    }
}
