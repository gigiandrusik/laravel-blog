<?php
/**
 * Created by PhpStorm.
 * User: andrusik
 * Date: 12/10/17
 * Time: 9:55 PM
 */

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Db\SessionStatistic;

/**
 * Class SessionController
 * @package App\Http\Controllers
 */
class SessionController extends Controller
{
    /**
     * @param Request $request
     *
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function getSession(Request $request)
    {
        if ($request->ajax()) {

            if (!$session = $request->session()->get('new_session')) {

                $request->session()->put('new_session', true);

                $session_statistic = new SessionStatistic([
                    'user_agent' => $request->server('HTTP_USER_AGENT'),
                    'ip'         => $request->ip(),
                ]);

                $session_statistic->save();
            }

            return false;
        }

        return redirect()->route('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function statistic()
    {
        $statistics = SessionStatistic::query()->paginate(10);

        $info = DB::table(SessionStatistic::getModel()->getTable())
            ->select('user_agent', DB::raw('count(*) as total'))
            ->groupBy('user_agent')
            ->pluck('total','user_agent')->all();

        return view('session.index', compact('statistics'))
            ->with('info', $info);
    }
}