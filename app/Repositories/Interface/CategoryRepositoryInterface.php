<?php

namespace App\Repositories\Interface;

interface CategoryRepositoryInterface
{
    public function getAllCategory();

//    public function createCate(array $data);
//
//    public function updateCate($id, array $data);
//    public function deleteCate($id);
    public function getIdCate($id);

}
