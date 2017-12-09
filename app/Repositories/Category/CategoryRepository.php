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
     * @param integer $id
     * @return bool
     */
    public function update(array $data, $id)
    {
        if (Category::find($id)->update($data)) {
            return true;
        }

        return false;
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
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function findOne($id)
    {
        return Category::find($id);
    }

    /**
     * @param integer $id
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}