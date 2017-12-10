<?php

namespace App\Http\Controllers;

use App\Models\Db\Post;
use App\Http\Requests\PostRequest;
use App\Repositories\Post\PostRepository;
use App\Repositories\Category\CategoryRepository;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * PostController constructor.
     *
     * @param PostRepository $postRepository
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postRepository->all();

        return view('post.index', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('post.create')
            ->with('categories', $this->categoryRepository->getList());
    }

    /**
     * @param PostRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $status  = 'success';
        $message = 'Post created successfully';

        if (!$this->postRepository->create($request->all())) {

            $status  = 'error';
            $message = 'Cannot create post.';
        }

        return redirect()->route('post.index')
            ->with($status, $message);
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * @param Post $post
     * @return $this
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'))
            ->with('categories', $this->categoryRepository->getList());
    }

    /**
     * @param PostRequest $request
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $status  = 'success';
        $message = 'Post updated successfully';

        if (!$this->postRepository->update($request->validated(), $post)) {

            $status  = 'error';
            $message = 'Cannot update post.';
        }

        return redirect()->route('post.index')
            ->with($status, $message);
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $status  = 'success';
        $message = 'Post deleted successfully';

        if (!$this->postRepository->delete($post)) {

            $status  = 'error';
            $message = 'Cannot delete post.';
        }

        return redirect()->route('post.index')
            ->with($status, $message);
    }
}
