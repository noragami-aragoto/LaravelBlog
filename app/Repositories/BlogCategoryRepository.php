<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Repositories\Interfaces\BlogCategoryRepositoryInterface;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{

    private $model;

    public function __construct()
    {
        $this->model = app(BlogCategory::class);
    }

    protected function startCondition()
    {
        return clone $this->model;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->startCondition()->find($id);
    }

    public function getComboBox()
    {
        $fields = implode(',', [
            'id',
            'CONCAT (id, ". " ,title) as id_title'
        ]);
        return $this->startCondition()
            ->selectRaw($fields)
            ->toBase()
            ->get();
    }

    public function getAllWithPaginate(int $perPage)
    {
        $columns = ['id', 'title', 'parent_id'];
        return $this->startCondition()
            ->select($columns)
            ->paginate($perPage);
    }
}
