<?php

namespace App\Models\Db;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionStatistic
 *
 * @property int $id
 * @property string $user_agent
 * @property string $ip
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\SessionStatistic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\SessionStatistic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\SessionStatistic whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\SessionStatistic whereIp($value)
 * @mixin \Eloquent
 *
 * @package App\Models\Db
 */
class SessionStatistic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_agent', 'ip'
    ];
}
