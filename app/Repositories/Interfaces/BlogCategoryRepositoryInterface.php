<?php

namespace App\Repositories\Interfaces;

interface BlogCategoryRepositoryInterface
{

    public function getById(int $id);

    public function getComboBox();

    public function getAllWithPaginate(int $perPage);

}
