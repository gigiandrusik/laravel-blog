<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * HomeController constructor.
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->middleware('session.log');

        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home.index', [
            'categories' => $this->category->paginate()
        ]);
    }
}