<?php

namespace App\Observers;

use App\Models\Db\Category;

/**
 * Class CategoryObserver
 *
 * @package App\Observers
 */
class CategoryObserver
{
    /**
     * @param Category $category
     */
    public function deleted(Category $category)
    {
        $category->comments()->delete();
    }
}