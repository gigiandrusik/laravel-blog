<?php

namespace App\Http\Controllers;

use App\Models\Db\Category;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryRepository;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('category.index', compact('categories'));
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
        $status  = 'success';
        $message = 'Category created successfully';

        if (!$this->categoryRepository->create($request->all())) {

            $status  = 'error';
            $message = 'Cannot create category.';
        }

        return redirect()->route('category.index')
            ->with($status, $message);
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
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $status  = 'success';
        $message = 'Category updated successfully';

        if (!$this->categoryRepository->update($request->validated(), $category)) {

            $status  = 'error';
            $message = 'Cannot update category.';
        }

        return redirect()->route('category.index')
            ->with($status, $message);
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
        $status  = 'success';
        $message = 'Category deleted successfully';

        if (!$this->categoryRepository->delete($category)) {

            $status  = 'error';
            $message = 'Cannot delete category.';
        }

        return redirect()->route('category.index')
            ->with($status, $message);
    }
}