<?php

namespace App\Service;

use App\Repositories\HangsanxuatRepository;

class HangsanxuatService
{
    protected $hangsxRepository;

    public function __construct(HangsanxuatRepository $hangsxRepository)
    {
        $this->hangsxRepository = $hangsxRepository;
    }

    public function GetAll()
    {
        return $this->hangsxRepository->GetAllHangsx();

    }

}
