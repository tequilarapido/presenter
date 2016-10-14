<?php

namespace Tequilarapido\Presenter;

use Illuminate\Database\Eloquent\Model;

abstract class Presenter
{

    /**
     * Model
     *
     * @var Model
     */
    protected $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get model attribute
     *
     * @param $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->model->getAttribute($key);
    }

    /**
     * Allow for property-style retrieval
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->model->{$property};
    }
}
