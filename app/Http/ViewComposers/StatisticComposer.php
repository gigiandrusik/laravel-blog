<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Session\SessionRepository;

/**
 * Class StatisticComposer
 *
 * @package App\Http\ViewComposers
 */
class StatisticComposer
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
        $this->session = $session;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('info', $this->session->info());
    }
}