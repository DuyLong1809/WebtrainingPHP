<?php

namespace App\Repositories;

use App\Models\Hangsanxuat;

class HangsanxuatRepository implements Interface\HangsanxuatRepositoryInterface
{
    protected $HangsxModel;

    public function __construct(Hangsanxuat $HangsxModel)
    {
        $this->HangsxModel = $HangsxModel;
    }

    public function GetAllHangsx()
    {
        return $this->HangsxModel->all();
    }

    public function GetIdManu($id)
    {
        return $this->HangsxModel->findOrFail($id);
    }

}

