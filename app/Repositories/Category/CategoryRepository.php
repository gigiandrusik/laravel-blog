<?php

namespace App\Repositories\Category;

use App\Models\Db\Category;

/**
 * Class CategoryRepository
 * @package App\Repositories\Category
 */
class CategoryRepository
{
    /**
     * @param array $data
     *
     * @return Category|bool
     */
    public function create(array $data)
    {
        $category = new Category($data);

        if (!$category->save()) {
            return false;
        }

        return $category;
    }

    /**
     * @param array $data
     *
     * @param Category $category
     *
     * @return bool
     */
    public function update(array $data, Category $category)
    {
        return $category->update($data);
    }

    /**
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all($perPage = 5)
    {
        return Category::query()->paginate($perPage);
    }

    /**
     * @param Category $category
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete(Category $category)
    {
        return $category->delete();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $categories = [];

        foreach (Category::all() as $category) {
            $categories = array_add($categories, $category->id, $category->name);
        }

        return $categories;
    }
}