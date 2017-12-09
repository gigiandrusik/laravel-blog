<?php

namespace App\Http\Controllers;

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
        $this->categoryRepository->create($request->validated());

        return redirect()->route('category.index')
            ->with('success', 'Category created successfully');
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findOne($id);

        return view('category.show', compact('category'));
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findOne($id);

        return view('category.edit', compact('category'));
    }

    /**
     * @param CategoryRequest $request
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepository->update($request->validated(), $id);

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}