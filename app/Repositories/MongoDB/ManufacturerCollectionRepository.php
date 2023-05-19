<?php

namespace App\Repositories\MongoDB;

use App\Models\Manufacturer;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\ManufacturerRepositoryInterface;

class ManufacturerCollectionRepository extends BaseRepository implements ManufacturerRepositoryInterface
{
    protected Manufacturer $ManuModel;
    public function __construct(Manufacturer $ManuModel)
    {
        $this->model = $ManuModel;
    }
}
