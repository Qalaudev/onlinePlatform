<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements InterfaceCategoryRepository
{

    public function getAllCategory(): Collection
    {
        return Category::all();
    }

    public function getByIdCategory(int $id): ?Category
    {
        return Category::find($id);
    }

    public function createCategory(array $data): Category
    {
        return Category::create($data);
    }


    public function updateCategory(int $id, array $data): bool
    {
        $category = Category::find($id);
        if ($category) {
            return $category->update($data);
        }
        return false;
    }

    public function deleteCategory(int $id): bool
    {
        $category = Category::find($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }

    public function searchCategory(array $filters): Collection
    {
        $query = Category::query();

        // Применение фильтров, если они предоставлены
        foreach ($filters as $key => $value) {
            $query->where($key, $value);
        }

        return $query->get();
    }
}
