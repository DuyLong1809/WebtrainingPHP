<?php

namespace App\Repositories\Interface;

interface ManufacturerRepositoryInterface
{
//    public function CreateManu(array $data);
//    public function UpdateManu($id, array $data);
    public function all();
    public function findById($id);
//    public function DeleteManu($id);
}
