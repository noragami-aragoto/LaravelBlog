<?php

namespace App\Repositories\Interfaces;

interface BlogPostRepositoryInterface
{
    public function getAll();

    public function getAllWithPaginate(int $perPage);
}
