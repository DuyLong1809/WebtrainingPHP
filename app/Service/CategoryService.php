<?php

namespace App\Service;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->getAllCategory();
    }

    public function getIdCate($id)
    {
        return $this->categoryRepository->getIdCate($id);
    }
}
