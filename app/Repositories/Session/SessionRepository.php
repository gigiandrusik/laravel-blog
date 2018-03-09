<?php

namespace App\Repositories\Session;

use DB;
use App\Models\Db\SessionStatistic;

/**
 * Class SessionRepository
 *
 * @package App\Repositories\Session
 */
class SessionRepository
{
    /**
     * @param array $data
     *
     * @return bool
     */
    public function create(array $data)
    {
        $session = new SessionStatistic($data);

        return $session->save();
    }

    /**
     * @param null|int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = null)
    {
        return SessionStatistic::paginate($perPage);
    }

    /**
     * @return array
     */
    public function info()
    {
        return DB::table(SessionStatistic::getModel()->getTable())
            ->select('user_agent', DB::raw('count(*) as total'))
            ->groupBy('user_agent')
            ->pluck('total','user_agent')
            ->all();
    }
}