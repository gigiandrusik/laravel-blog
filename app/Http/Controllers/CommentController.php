<?php

namespace App\Http\Controllers;

use App\Models\Db\PostComment;
use App\Models\Db\CategoryComment;
use App\Http\Requests\CommentRequest;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @param CommentRequest $request
     *
     * @return CategoryComment|bool
     */
    public function addCommentToCategory(CommentRequest $request)
    {
        $comment = new CategoryComment($request->all());

        if ($comment->save()) {
            return $comment;
        }

        return false;
    }

    /**
     * @param CommentRequest $request
     *
     * @return PostComment|bool
     */
    public function addCommentToPost(CommentRequest $request)
    {
        $comment = new PostComment($request->all());

        if ($comment->save()) {
            return $comment;
        }

        return false;
    }
}