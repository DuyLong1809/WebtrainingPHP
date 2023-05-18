<?php

namespace App\Repositories\MongoDB;

use App\Models\Category;
use App\Models\Img_slide;
use App\Models\Img_slide_collection;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\Img_slideRepositoryInterface;

class Img_slideCollectionRepository extends BaseRepository implements Img_slideRepositoryInterface
{
    public function __construct(Img_slide_collection $img_slideModel)
    {
        $this->model = $img_slideModel;
    }
}
