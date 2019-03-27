<?php

namespace PPSpaces\Repositories;

use JsonSerializable;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Contracts\Routing\UrlRoutable;
use PPSpaces\Contracts\Model as RepositoryContract;

abstract class Model implements RepositoryContract, JsonSerializable, UrlRoutable {

    use ForwardsCalls;

    /**
     * The repository instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $repository;

    /**
     * Create a new repository instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function __construct($model) {
        $this->repository = $model;
    }

    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']) {
        return $this->get($columns);
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function get($columns = ['*']) {
        return $this->repository->get($columns);
    }

    /**
     * Get a new query of one model by their IDs.
     *
     * @param  array|int  $ids
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id) {
        return $this->repository->findOrFail($id);
    }

    /**
     * Perform a model create operation.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $query
     * @return bool
     */
    public function create(array $attributes) {
        return $this->repository->create($attributes);
    }

    /**
     * Update the model in the database.
     *
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function update(array $attributes = []) {
        return $this->repository->update($attributes);
    }

    /**
     * Delete the model from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete($id) {
        return $this->repository->findOrFail($id)->delete();
    }

    /**
     * Destroy the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int  $ids
     * @return int
     */
    public static function destroy($ids) {
        //
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->repository->getAttribute($this->getRouteKeyName());
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->repository->getKeyName();
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        return $this->repository->where($this->getRouteKeyName(), $value)->first();
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->repository->toArray();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->repository->toJson();
    }
}
