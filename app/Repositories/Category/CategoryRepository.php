<?php

namespace App\Repositories\Category;

use App\Models\Db\Category;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories\Category
 */
class CategoryRepository
{
    /**
     * @param array $data
     *
     * @return Category|false
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
     * @param Category $category
     * @param array $data
     *
     * @return Category|false
     */
    public function update(Category $category, array $data)
    {
        if ($category->update($data)) {
            return $category;
        }

        return false;
    }

    /**
     * @param null|int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = null)
    {
        return Category::paginate($perPage);
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
        return collect(Category::all())->pluck('name', 'id')->toArray();
    }

    /**
     * @param Category $category
     * @param array $data
     * @return bool|\Illuminate\Database\Eloquent\Model|null|static
     */
    public function addComment(Category $category, array $data)
    {
        if ($category->comments()->create($data)) {
            return $category->comments()->latest()->first();
        }

        return false;
    }
}