<?php

namespace App\Repositories;

use App\Models\Manufacturer;

class ManufacturerRepository extends BaseRepository implements Interface\ManufacturerRepositoryInterface
{
    protected Manufacturer $ManuModel;
    public function __construct(Manufacturer $ManuModel)
    {
        $this->model = $ManuModel;
    }
}

