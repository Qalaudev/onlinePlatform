<?php

namespace App\Repositories;

interface InterfaceCategoryRepository
{
    public function getAllCategory();
    public function getByIdCategory(int $id);
    public function createCategory(array $data);
    public function updateCategory(int $id, array $data);
    public function deleteCategory(int $id);
    public function searchCategory(array $filters);
}
