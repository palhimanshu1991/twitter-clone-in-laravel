<?php

namespace App\Contracts;

interface Repository
{

    /**
     * Get all resources
     *
     * @return mixed
     */
    public function all();

    /**
     * Find a single resource
     *
     * @param $id integer
     * @return mixed
     */
    public function find($id);

    /**
     * Create a new resource in database
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a resource in database
     *
     * @param $id   integer
     * @param $data array
     * @return mixed
     */
    public function update($id, $data);

    /**
     * Delete a resource from database
     *
     * @param $id
     * @return boolean
     */
    public function delete($id);

}
