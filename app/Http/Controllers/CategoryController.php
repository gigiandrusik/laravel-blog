<?php

namespace App\Http\Controllers;

use App\Models\Db\Category;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryRepository;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('category.index', [
            'categories' => $this->category->paginate()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @param CategoryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        if ($this->category->create($request->validated())) {

            return redirect()->route('category.index')
                ->with('success', 'Category created successfully!');
        }

        return back()->withInput();
    }

    /**
     * @param Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * @param Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($this->category->update($category, $request->validated())) {

            return redirect()->route('category.index')
                ->with('success', 'Category updated successfully');
        }

        return back()->withInput();
    }

    /**
     * @param Category $category
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if ($this->category->delete($category)) {
            return back()->with('success', 'Category deleted successfully!');
        }

        return back()->with('error', 'Cannot delete category.');
    }

    /**
     * @param CommentRequest $request
     * @param Category $category
     *
     * @return bool|\Illuminate\Database\Eloquent\Model|null|static
     */
    public function addComment(CommentRequest $request, Category $category)
    {
        if ($comment = $this->category->addComment($category, $request->validated())) {
            return $comment;
        }

        return false;
    }
}