<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Repositories\Interfaces\BlogCategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentBlogCategory implements BlogCategoryRepositoryInterface
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }


    /**s
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function getComboBox()
    {
        $fields = implode(',', [
            'id',
            'CONCAT (id, ". " ,title) as id_title'
        ]);
        return $this->model
            ->selectRaw($fields)
            ->toBase()
            ->get();
    }

    public function getAllWithPaginate(int $perPage)
    {
        $columns = ['id', 'title', 'parent_id'];
        return $this->model
            ->select($columns)
            ->paginate($perPage);
    }
}
