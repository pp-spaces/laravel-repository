<?php

namespace PPSpaces\Contracts;

interface Repository
{

    /**
     * Scope a query for the model before executing
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return void
     */
    public function before($query);

    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function get($columns);

    /**
     * Get a new query of one model by their IDs.
     *
     * @param  array|int  $ids
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id);

    /**
     * Perform a model create operation.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $query
     * @return bool
     */
    public function create(array $attributes);

    /**
     * Update the model in the database.
     *
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function update(array $attributes = []);

    /**
     * Delete the model from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete($id);

    /**
     * Destroy the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int  $ids
     * @return int
     */
    public static function destroy($ids);

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model();

    /**
     * Resolve the given model from the container.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws PPSpaces\Exceptions\RepositoryException
     */
    public function initializeRepository();
}
