<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    public function get($relationships = [], array $columns = ['*'])
    {
        return $this->model->with($relationships)->get($columns);
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'desc')->whereNull('deleted_at')->get();
    }

    public function getColum($colum = '*')
    {
        return $this->model->select($colum)->orderBy('id', 'desc')->get();
    }

    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    public function where($field, $value)
    {
        return $this->model->where($field, '=', $value);
    }
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        return $this->model->whereIn($field, $values);
    }
    public function with($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $limit = is_null($limit) ? config('constant.pagination.limit', 15) : $limit;
        $results = $this->model->{$method}($limit, $columns);
        $results->appends(app('request')->query());

        return $results;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->model = $this->model->orderBy($column, $direction);

        return $this;
    }
    public function whereIn($column, $compare, $value){
        $this->model = $this->model->where($column, $compare, $value);
        return $this;

    }

}
