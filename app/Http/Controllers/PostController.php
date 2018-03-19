<?php

namespace App\Http\Controllers;

use App\Models\Db\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;
use App\Repositories\Post\PostRepository;
use App\Repositories\Category\CategoryRepository;

/**
 * Class PostController
 *
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $post;

    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * PostController constructor.
     *
     * @param PostRepository $post
     *
     * @param CategoryRepository $category
     */
    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('post.index', [
            'posts' => $this->post->paginate()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('post.create', [
            'categories' => $this->category->getList()
        ]);
    }

    /**
     * @param PostRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        if ($this->post->create($request->validated())) {

            return redirect()->route('post.index')
                ->with('success', 'Post created successfully!');
        }

        return back()->withInput();
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
            ->with('categories', $this->category->getList());
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
        if ($this->post->update($post, $request->validated())) {

            return redirect()->route('post.index')
                ->with('success', 'Post updated successfully!');
        }

        return back()->withInput();
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
        if ($this->post->delete($post)) {
            return back()->with('success', 'Post deleted successfully.');
        }

        return back()->with('error', 'Cannot delete post.');
    }

    /**
     * @param CommentRequest $request
     * @param Post $post
     *
     * @return bool|\Illuminate\Database\Eloquent\Model|null|static
     */
    public function addComment(CommentRequest $request, Post $post)
    {
        if ($comment = $this->post->addComment($post, $request->validated())) {
            return $comment;
        }

        return false;
    }
}
