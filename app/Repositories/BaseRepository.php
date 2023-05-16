<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
        return $this->model->newModelQuery()->get();
    }
    public function findById($id)
    {
        return $this->model->newModelQuery()->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $find_id = $this->findById($id);
        return $find_id->update($data);
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
