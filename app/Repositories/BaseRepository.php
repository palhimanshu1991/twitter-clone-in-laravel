<?php

namespace App\Repositories;

use App\Contracts\Repository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Repository
{
    /**
     * Classpath of model
     *
     * @var Model
     */
    protected $model;

    /**
     * Get all resources
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model()->paginate();
    }

    /**
     * Return model instance
     *
     * @return Model
     */
    public function model()
    {
        return new $this->model;
    }

    /**
     * Create a new resource in database
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model()->create($data);
    }

    /**
     * Update a resource in database
     *
     * @param $id   integer
     * @param $data array
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }

    /**
     * Find a single resource
     *
     * @param $id integer
     * @return mixed
     */
    public function find($id)
    {
        return $this->model()->findorFail($id);
    }

    /**
     * Delete a resource from database
     *
     * @param $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->delete($id);
    }

    /**
     * Get model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model
     *
     * @param Model $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

}