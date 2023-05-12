<?php

namespace App\Repositories;

use App\Models\Img_slide;
use Illuminate\Database\Eloquent\Model;

class Img_slideRepository extends BaseRepository implements Interface\Img_slideRepositoryInterface
{
    protected Img_slide $img_slideModel;
    public function __construct(Img_slide $img_slideModel)
    {
        $this->model = $img_slideModel;
    }


}
