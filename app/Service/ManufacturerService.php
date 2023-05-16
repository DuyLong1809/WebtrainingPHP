<?php

namespace App\Service;

use App\Repositories\Interface\ManufacturerRepositoryInterface;
use App\Repositories\ManufacturerRepository;

class ManufacturerService
{
    protected $ManuRepository;

    public function __construct(ManufacturerRepositoryInterface $ManuRepository)
    {
        $this->ManuRepository = $ManuRepository;
    }

    public function GetAll()
    {
        return $this->ManuRepository->all();

    }

}
