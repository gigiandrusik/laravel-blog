<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * HomeController constructor.
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

        return view('site.index', compact('categories'));
    }
}