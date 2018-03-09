<?php

namespace App\Http\Controllers;

use App\Repositories\Session\SessionRepository;

/**
 * Class SessionController
 *
 * @package App\Http\Controllers
 */
class SessionController extends Controller
{
    /**
     * @var SessionRepository
     */
    protected $session;

    /**
     * SessionController constructor.
     *
     * @param SessionRepository $session
     */
    public function __construct(SessionRepository $session)
    {
        $this->middleware('session.log');

        $this->session = $session;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function statistic()
    {
        return view('session.index', [
            'statistics' => $this->session->paginate(),
            'info' => $this->session->info()
        ]);
    }
}