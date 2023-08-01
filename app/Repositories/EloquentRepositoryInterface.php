<?php

declare(strict_types=1);

namespace App\Repositories;

interface EloquentRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function all();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $attributes);

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id);

    /**
     * Create
     *
     * @param $id
     * @return bool
     */
    public function create($attribute);

    /**
     * Insert
     *
     * @param $array
     * @return bool
     */
    public function insert($array);

    /**
     * Update
     * @param $id, $attribute
     * @return bool
     */

    public function update($id, $attribute);

    /**
     * @param $table
     * @param $credentials
     * @return mixed
     */

    public function insertOrUpdate($table, $credentials);

    /**
     * @param $path
     * @return mixed
     */
    public function replaceDestinationPath($path);
}
