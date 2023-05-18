<?php

namespace App\Repositories;

use App\Models\ProductDomain;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class BaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function all()
    {
        return $this->model->all();
    }
    public function findById($id): ProductDomain
    {
        $data = $this->model->newModelQuery()->find($id);
        return $data->convertToDomain();
    }

    public function create(array $data): ProductDomain
    {
        $data = $this->model->create($data);
        return $data->convertToDomain();
    }

    public function update($id, array $data): ProductDomain
    {
        $find_id = $this->model->findOrFail($id);
        $find_id->update($data);
        return $find_id->convertToDomain();
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
