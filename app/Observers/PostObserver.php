<?php

namespace App\Observers;

use App\Models\Db\Post;

/**
 * Class PostObserver
 *
 * @package App\Observers
 */
class PostObserver
{
    /**
     * @param Post $post
     */
    public function deleted(Post $post)
    {
        $post->comments()->delete();
    }
}