<?php

namespace App\Services;

use App\Repositories\InterfaceCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(InterfaceCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Получить все категории.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategory(): Collection
    {
        return $this->categoryRepository->getAllCategory();
    }

    /**
     * Найти категорию по ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function findByIdCategory(int $id): ?Category
    {
        return $this->categoryRepository->getByIdCategory($id);
    }

    /**
     * Создать новую категорию.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function createCategory(array $data): Category
    {
        return $this->categoryRepository->createCategory($data);
    }

    /**
     * Обновить категорию по ID.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateCategory(int $id, array $data): bool
    {
        return $this->categoryRepository->updateCategory($id, $data);
    }

    /**
     * Удалить категорию по ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory(int $id): bool
    {
        return $this->categoryRepository->deleteCategory($id);
    }
}
