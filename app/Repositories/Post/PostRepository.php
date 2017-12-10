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
     * @return Post|bool
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
     * @param array $data
     *
     * @param Post $post
     *
     * @return bool
     */
    public function update(array $data, Post $post)
    {
        if (isset($data['file']) && $image_name = FileUploadHelper::changeImage($data['file'], $post->file)) {
            $data['file'] = $image_name;
        }

        return $post->update($data);
    }

    /**
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all($perPage = 5)
    {
        return Post::query()->paginate($perPage);
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
}