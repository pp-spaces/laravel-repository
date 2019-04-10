<?php

namespace PPSpaces\Repositories;

use ReflectionClass;
use JsonSerializable;

use Illuminate\Container\Container as App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Routing\UrlRoutable;

use PPSpaces\Exceptions\RepositoryException;
use PPSpaces\Contracts\Repository as RepositoryContract;

abstract class Repository implements RepositoryContract, JsonSerializable, UrlRoutable {

    /**
     * The application instance being facaded.
     *
     * @var \Illuminate\Container\Container
     */
    protected $app;

    /**
     * The Model class name.
     *
     * @var string
     */
    protected $model;

    /**
     * The repository instance.
     *
     * @var mixed
     */
    protected $repository;

    /**
     * The model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $resolver;

    /**
     * The resolved model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $resolved;

    /**
     * Create a new repository instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function __construct(App $app) {
        $this->app = $app;

        $this->initializeRepository();
    }

    /**
     * Scope a query for the model before executing
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return void
     */
    public function before($query) {}

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
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return $this->model;
    }

    /**
     * Resolve the given model from the container.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws PPSpaces\Exceptions\RepositoryException
     */
    public function initializeRepository() {
        $model = $this->app->make($this->model);

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        $this->repository = $model->newQuery();

        $this->before($this->repository);
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->resolver->getAttribute($this->getRouteKeyName());
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->resolver->getKeyName();
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        $this->resolver = (new $this->model);

        $this->resolved = $this->resolver->where($this->getRouteKeyName(), $value)->first() ?? abort(404);

        return $this;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->resolved->toArray();
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->resolved->toArray();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->resolved->toJson();
    }
}
