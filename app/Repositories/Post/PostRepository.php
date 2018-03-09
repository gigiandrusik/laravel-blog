<?php

namespace App\Repositories\Post;

use App\Models\Db\Post;
use App\Helpers\FileUploadHelper;

/**
 * Class PostRepository
 * @package App\Repositories\Post
 */
class PostRepository
{
    /**
     * @param array $data
     *
     * @return Post|false
     */
    public function create(array $data)
    {
        $post = new Post($data);

        if ($image_name = FileUploadHelper::uploadImage($data['file'])) {

            $post->setAttribute('file', $image_name);

            if ($post->save()) {
                return $post;
            }
        }

        return false;
    }

    /**
     * @param Post $post
     * @param array $data
     *
     * @return Post|false
     */
    public function update(Post $post, array $data)
    {
        if (isset($data['file']) && $image_name = FileUploadHelper::changeImage($data['file'], $post->file)) {
            $data['file'] = $image_name;
        }

        return $post->update($data) ? $post : false;
    }

    /**
     * @param null|int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = null)
    {
        return Post::paginate($perPage);
    }

    /**
     * @param Post $post
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        if (FileUploadHelper::deleteImage($post->file)) {
            return $post->delete();
        }

        return false;
    }

    /**
     * @param Post $post
     * @param array $data
     *
     * @return bool|\Illuminate\Database\Eloquent\Model|null|static
     */
    public function addComment(Post $post, array $data)
    {
        if ($post->comments()->create($data)) {
            return $post->comments()->latest()->first();
        }

        return false;
    }
}