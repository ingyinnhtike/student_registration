<?php


namespace App\Repositories;

use App\Models\constracts\HaveTownship;
use App\Repositories\Contracts\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepositoryImpl implements BaseRepository
{
    /**
     * Additional fields to save as Json in data column
     * @var array
     */
    protected $additional_fields = [

    ];

    protected $required_fields = [

    ];

    protected $use_prefix = true;

    /**
     * generate Eloquent Model populated with values
     * defined in $fillable fields from model and
     * $additional_fields from BaseRepositoryImpl
     *
     * @param array $data
     * @param bool $usePrefix
     * @return Model
     */
    protected function generateModel(array $data, bool $usePrefix = true): Model
    {
        $class = $this->model();
        $data = $this->getPrimaryData($data, $usePrefix);
        $model = new $class($data);
        $approved_at = extract_value_from_array('approved_at', $data);
        if ($approved_at) {
            $model->updated_at = $approved_at;
            $model->created_at = $approved_at;
        }
        $additional_data = $this->getAdditionalData($data);
        $model->data = $additional_data;
        return $model;
    }

    public function create($data, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }

        $use_prefix = $this->use_prefix;

        if ($this->checkModelHaveRequiredFields($data, $use_prefix)) {

            $model = $this->generateModel($data, $use_prefix);
            $relationToOwner = $this->relationToOwner();
            $model = $model_owner->$relationToOwner()->save($model);
            if ($model instanceof HaveTownship) {
                $model->saveTownship($model->township);
            }
            return $model;
        } else {
            return "{$this->model()} does not have required Fields. Not Created.";
        }
    }

    public function update($data, $model, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }

        $use_prefix = $this->use_prefix;

        if ($this->checkModelHaveRequiredFields($data, $use_prefix)) {

            $primary_data = $this->getPrimaryData($data, $use_prefix);
            $model->data = $this->getAdditionalData($primary_data);
            if ($model instanceof HaveTownship) {
                $model->saveTownship(extract_value_from_array('township', $primary_data));
            }
            return $model->update($primary_data);
        } else {
            return "{$this->model()} does not have required Fields. Not Updated.";
        }
    }

    public function updateOrCreate(array $original_data, $model_owner = null)
    {
        if ($model_owner == null) {
            $model_owner = auth()->user();
        }

        $relation_to_owner = $this->relationToOwner();

        $model = $model_owner->$relation_to_owner;
        if ($model instanceof Collection) {
            $model = $model->last();
        }

        if ($this->shouldUpdate($model, $original_data)) {

            return $this->update($original_data, $model, $model_owner);

        } else {
            return $this->create($original_data, $model_owner);

        }


    }

    /**
     * determine whether the model update or create
     * @param $model
     * @param array $data
     * @return bool
     */
    protected function shouldUpdate($model, array $data): bool
    {
        if ($model !== null) {
//            already has a relationship, model should be updated
            return true;
        } else {
//            there is no relationship, model should not be updated,
//            new model should be created
            return false;
        }

    }

    /**
     * Get data array as defined in $fillable from model
     * NOTED: if values in $data param does not start with prefix, set usePrefix false
     * @param array $data
     * @param bool $usePrefix
     * @return array|string
     */

    protected function getPrimaryData(array $data, bool $usePrefix = true)
    {
        $prefix = $usePrefix ? $this->prefix() : '';
        if ($prefix) {
            $data = extract_data_from_array($data, $prefix);
        }

        return $data;
    }

    /**
     * Get data array defined in $additional_fields
     * NOTED: $data param MUST NOT start with prefix
     * @param array $data
     * @return array|string
     */
    protected function getAdditionalData(array $data)
    {
        return extract_additional_data($data, $this->additional_fields);
    }

    protected function checkModelHaveRequiredFields($original_data, bool $usePrefix = true)
    {

        $prefix = $usePrefix ? $this->prefix() : '';
        foreach ($this->required_fields as $required_field) {
            if ($prefix !== '') {
                $key = $prefix . '_' . $required_field;
            } else {
                $key = $required_field;
            }
            if (!array_key_exists($key, $original_data) || $original_data[$key] === null) {
                return false;
            }
        }
        return true;
    }
}
