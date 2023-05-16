<?php

namespace App\Service;

use App\Repositories\CategoryRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->all();
    }

    public function getIdCate($id)
    {
        return $this->categoryRepository->findById($id);
    }
}
