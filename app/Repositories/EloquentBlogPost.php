<?php

namespace App\Repositories;

use App\Models\BlogPost;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentBlogPost implements BlogPostRepositoryInterface
{

    /**
     * @var Model
     */
    private $model;

    /**
     * @param BlogPost $model
     */
    public function __construct(BlogPost $model)
    {
        $this->model = $model;
    }


    public function getAll()
    {
        return $this->model->all();
    }


    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate(int $perPage): LengthAwarePaginator
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
            'excerpt'
        ];
        return $this->model
            ->select($columns)
            ->paginate($perPage);
    }
}
