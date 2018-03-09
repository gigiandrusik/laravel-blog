<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\Session\SessionRepository;

/**
 * Class SessionLog
 *
 * @package App\Http\Middleware
 */
class SessionLog
{
    /**
     * @var SessionRepository
     */
    protected $session;

    /**
     * SessionLog constructor.
     *
     * @param SessionRepository $session
     */
    public function __construct(SessionRepository $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->get('new_session')) {

            $request->session()->put('new_session', true);

            $this->session->create([
                'ip' => $request->getClientIp(),
                'user_agent' => $request->header('user-agent'),
            ]);
        }

        return $next($request);
    }
}