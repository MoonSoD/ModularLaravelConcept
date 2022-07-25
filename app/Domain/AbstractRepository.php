<?php

namespace App\Domain;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRepository
{
    public EloquentModel $model;
    public Builder $query;

    public function __construct(string $model)
    {
        $this->model = app($model);
        $this->query = $this->model::query();
    }

    public function simplePaginate(int $limit = 10, array $criteria = []): Paginator
    {
        return $this->query
            ->where($criteria)
            ->simplePaginate($limit);
    }

    public function paginate(int $limit = 10, array $criteria = []): LengthAwarePaginator
    {
        return $this->query
            ->where($criteria)
            ->paginate($limit);
    }

    public function findOrFail(int $id, array $columns = ['*']): EloquentModel
    {
        return $this->query
            ->findOrFail($id, $columns);
    }

    public function find(int $id, array $columns = ['*']): EloquentModel
    {
        return $this->query
            ->find($id, $columns);
    }

    public function create(array $data = []): EloquentModel
    {
        return $this->query
            ->create($data);
    }

    public function updateOrCreate(int $id, array $data = []): EloquentModel
    {
        return $this->query
            ->updateOrCreate(['id' => $id], $data);
    }

    public function update(int $id, array $data = []): int|bool|EloquentModel
    {
        return $this->query
            ->find($id)
            ->update($data);
    }

    /**
     * @throws Exception
     */
    public function delete(int $id = 0): int|bool
    {
        return $this->query
            ->find($id)
            ->delete();
    }
}