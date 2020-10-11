<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Model property on class instance.
     *
     * @var Model
     */
    private Model $model;

    /**
     * Constructor to bind the model to the repository.
     *
     * @param  Model  $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get the first instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function first()
    {
        return $this->model->first();
    }

    /**
     * Store a new record in the database.
     *
     * @param  array  $data
     * @return void
     */
    public function store(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update the specified record in the database.
     *
     * @param  array  $data
     * @param  int  $id
     * @return void
     */
    public function update(array $data, int $id)
    {
        return $this->model->findOFail($id)->update($data);
    }

    /**
     * Delete a record from the database.
     *
     * @param  int  $id
     * @return int
     */
    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Retrieve the record with the given id.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Bind the current model to its provided relationship.
     *
     * @param  string|array  $relation
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with($relation)
    {
        return $this->model->with($relation);
    }
}
