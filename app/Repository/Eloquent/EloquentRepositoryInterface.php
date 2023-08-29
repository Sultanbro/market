<?php

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param $id
     * @return Model
     */
    public function findOrFail(int $id): ?Model;

    /**
     * @param $column
     * @return mixed
     */
    public function firstOrFail($column);

    /**
     * @return Model[]|Collection
     */
    public function all(): Collection;

    /**
     * @return Model[]|Collection
     */
    public function query(): Builder;

    /**
     * @param int $modelId
     * @param array $attributes
     * @return bool
     */
    public function update(int $modelId, array $attributes): bool;

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id): bool;

    /**
     * @param array $attributes
     * @return mixed
     */
    public function firstOrCreate(array $attributes);

    /**
     * @param array $attributes1
     * @param array $attributes2
     * @return mixed
     */
    public function createOrUpdate(array $attributes1, array $attributes2);

    /**
     * @param $column
     * @param string $operator
     * @param $value
     * @return mixed
     */
    public function whereGet($column, $operator, $value);

    /**
     * @param $column
     * @param string $operator
     * @param $value
     * @return mixed
     */
    public function whereFirst($column, $operator, $value);
}

